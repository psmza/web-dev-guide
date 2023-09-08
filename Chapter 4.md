<hr>
<h2 id="chapter-4-user-access-levels">Chapter 4: User Access Levels</h2>
<h3 id="extending-the-user-table">4.1 Extending the User Table</h3>
<p>In this section, we’ll extend the user table to include a field for access level.</p>
<ol>
<li><strong>Modifying the User Table</strong>:
<ul>
<li>Open PHPMyAdmin and select the <code>webapp_db</code> database.</li>
<li>Click on the <code>users</code> table and then click the “Structure” tab.</li>
<li>Add a new field named <code>access_level</code> with type <code>ENUM('normal', 'staff', 'admin')</code> and a default value of <code>'normal'</code>.</li>
<li>Save the changes.</li>
</ul>
</li>
</ol>
<h3 id="modifying-the-login-process">4.2 Modifying the Login Process</h3>
<p>Before implementing user access levels, make sure your PHP files can interact with the database.</p>
<ol>
<li><strong>Create <code>db.php</code></strong>:
<ul>
<li>Create a file named <code>db.php</code> to store your database configuration.</li>
</ul>
</li>
</ol>
<pre class=" language-php"><code class="prism  language-php"><span class="token php language-php"><span class="token delimiter important">&lt;?php</span>
    <span class="token function">define</span><span class="token punctuation">(</span><span class="token string">'DB_SERVER'</span><span class="token punctuation">,</span> <span class="token string">'localhost'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
    <span class="token function">define</span><span class="token punctuation">(</span><span class="token string">'DB_USERNAME'</span><span class="token punctuation">,</span> <span class="token string">'root'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
    <span class="token function">define</span><span class="token punctuation">(</span><span class="token string">'DB_PASSWORD'</span><span class="token punctuation">,</span> <span class="token string">''</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
    <span class="token function">define</span><span class="token punctuation">(</span><span class="token string">'DB_NAME'</span><span class="token punctuation">,</span> <span class="token string">'webapp_db'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token delimiter important">?&gt;</span></span>
</code></pre>
<ol start="2">
<li><strong>Create <code>config.php</code></strong>:
<ul>
<li>Create a file named <code>config.php</code> to establish a connection to the database.</li>
</ul>
</li>
</ol>
<pre class=" language-php"><code class="prism  language-php"><span class="token php language-php"><span class="token delimiter important">&lt;?php</span>
    <span class="token keyword">include_once</span><span class="token punctuation">(</span><span class="token string">'db.php'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

    <span class="token variable">$conn</span> <span class="token operator">=</span> <span class="token keyword">new</span> <span class="token class-name">mysqli</span><span class="token punctuation">(</span><span class="token constant">DB_SERVER</span><span class="token punctuation">,</span> <span class="token constant">DB_USERNAME</span><span class="token punctuation">,</span> <span class="token constant">DB_PASSWORD</span><span class="token punctuation">,</span> <span class="token constant">DB_NAME</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

    <span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token variable">$conn</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">connect_error</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
        <span class="token keyword">die</span><span class="token punctuation">(</span><span class="token string">"Connection failed: "</span> <span class="token punctuation">.</span> <span class="token variable">$conn</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token property">connect_error</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
    <span class="token punctuation">}</span>
<span class="token delimiter important">?&gt;</span></span>

</code></pre>
<ol start="3">
<li><strong>Include <code>config.php</code> in <code>process_login.php</code></strong>:
<ul>
<li>In <code>process_login.php</code>, include the <code>config.php</code> file at the beginning to ensure a database connection is established.</li>
</ul>
</li>
</ol>
<pre class=" language-php"><code class="prism  language-php"><span class="token php language-php"><span class="token delimiter important">&lt;?php</span>
    <span class="token keyword">include_once</span><span class="token punctuation">(</span><span class="token string">'config.php'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

    <span class="token comment">// Rest of your code...</span>
<span class="token delimiter important">?&gt;</span></span>

</code></pre>
<h3 id="modifying-the-login-process-1">4.3 Modifying the Login Process</h3>
<p>Next, we’ll modify the login process to incorporate user access levels.</p>
<ol>
<li>
<p><strong>Updating <code>process_login.php</code></strong>:</p>
<ul>
<li>Open the <code>process_login.php</code> file in your text editor.</li>
</ul>
</li>
<li>
<p><strong>Authenticate and Redirect</strong>:</p>
<ul>
<li>After retrieving the username and password from the form submission, perform authentication. Check if the entered credentials match a user in the database.</li>
</ul>
<pre class=" language-php"><code class="prism  language-php"><span class="token comment">// Assuming $username and $password have been retrieved from the form submission</span>
<span class="token comment">// Perform database query to check credentials</span>
<span class="token variable">$query</span> <span class="token operator">=</span> <span class="token string">"SELECT * FROM users WHERE username='$username' AND password='$password'"</span><span class="token punctuation">;</span>
<span class="token variable">$result</span> <span class="token operator">=</span> <span class="token function">mysqli_query</span><span class="token punctuation">(</span><span class="token variable">$conn</span><span class="token punctuation">,</span> <span class="token variable">$query</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

<span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token function">mysqli_num_rows</span><span class="token punctuation">(</span><span class="token variable">$result</span><span class="token punctuation">)</span> <span class="token operator">==</span> <span class="token number">1</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
    <span class="token variable">$user</span> <span class="token operator">=</span> <span class="token function">mysqli_fetch_assoc</span><span class="token punctuation">(</span><span class="token variable">$result</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
 	<span class="token keyword">echo</span> <span class="token string">"Login Success!"</span>
    <span class="token comment">// Start session and store user details</span>

    <span class="token comment">// Redirect based on access level</span>
 	<span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token variable">$user</span><span class="token punctuation">[</span><span class="token string">'access_level'</span><span class="token punctuation">]</span> <span class="token operator">==</span> <span class="token string">'admin'</span><span class="token punctuation">)</span> <span class="token punctuation">{</span> 
 		<span class="token comment">//header("Location: admin_dashboard.php"); </span>
 		<span class="token keyword">echo</span> <span class="token string">'admin'</span><span class="token punctuation">;</span>
 	<span class="token punctuation">}</span> <span class="token keyword">elseif</span> <span class="token punctuation">(</span><span class="token variable">$user</span><span class="token punctuation">[</span><span class="token string">'access_level'</span><span class="token punctuation">]</span> <span class="token operator">==</span> <span class="token string">'staff'</span><span class="token punctuation">)</span> <span class="token punctuation">{</span> 
 		<span class="token comment">//header("Location: staff_dashboard.php"); </span>
 		<span class="token keyword">echo</span> <span class="token string">'staff'</span><span class="token punctuation">;</span>
 	<span class="token punctuation">}</span> <span class="token keyword">else</span> <span class="token punctuation">{</span> 
 		<span class="token comment">//header("Location: user_dashboard.php"); </span>
 		<span class="token keyword">echo</span> <span class="token string">'normal'</span><span class="token punctuation">;</span>
 	<span class="token punctuation">}</span>
<span class="token punctuation">}</span> <span class="token keyword">else</span> <span class="token punctuation">{</span>
    <span class="token comment">// Invalid credentials, display an error message</span>
    <span class="token keyword">echo</span> <span class="token string">"Invalid username or password. Please try again."</span><span class="token punctuation">;</span>
<span class="token punctuation">}</span>
</code></pre>
<p>Here’s what we’ve done:</p>
<ul>
<li>We execute a SQL query to check if there’s a match for the provided username and password in the database.</li>
<li>We then redirect the user to their respective dashboard based on their access level.</li>
</ul>
</li>
</ol>
<h3 id="conclusion">Conclusion</h3>
<p>In this chapter, we’ve extended the user table to include an <code>access_level</code> field and modified the login process to validate user access. Users are now directed to different dashboards based on their access level (normal, staff, admin).</p>
<p>The next chapters will focus on creating separate dashboards for each user type and implementing CRUD operations.</p>
<hr>

