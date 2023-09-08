<hr>
<h2 id="chapter-8-adding-session-management">Chapter 8: Adding Session Management</h2>
<h3 id="starting-a-session">8.1 Starting a Session</h3>
<p>Sessions are a crucial aspect of user authentication and maintaining state across multiple pages. Let’s implement session management in your application.</p>
<ol>
<li><strong>Start a Session</strong>:
<ul>
<li>At the beginning of each PHP file that requires session management, add <code>session_start();</code> to initialize the session.</li>
</ul>
</li>
</ol>
<pre class=" language-php"><code class="prism  language-php"><span class="token php language-php"><span class="token delimiter important">&lt;?php</span>
    <span class="token function">session_start</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
    <span class="token comment">// Rest of your code...</span>
<span class="token delimiter important">?&gt;</span></span>
</code></pre>
<h3 id="storing-user-information-in-sessions">8.2 Storing User Information in Sessions</h3>
<p>After a user logs in, you can store their information in the session to keep track of the authenticated user.</p>
<ol>
<li><strong>Store User Information</strong>:
<ul>
<li>In <code>process_login.php</code>, after validating the user’s credentials, set session variables to store user details.</li>
</ul>
</li>
</ol>
<pre class=" language-php"><code class="prism  language-php"><span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token variable">$user</span><span class="token punctuation">[</span><span class="token string">'access_level'</span><span class="token punctuation">]</span> <span class="token operator">==</span> <span class="token string">'admin'</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
    <span class="token variable">$_SESSION</span><span class="token punctuation">[</span><span class="token string">'user_id'</span><span class="token punctuation">]</span> <span class="token operator">=</span> <span class="token variable">$user</span><span class="token punctuation">[</span><span class="token string">'id'</span><span class="token punctuation">]</span><span class="token punctuation">;</span>
    <span class="token variable">$_SESSION</span><span class="token punctuation">[</span><span class="token string">'username'</span><span class="token punctuation">]</span> <span class="token operator">=</span> <span class="token variable">$user</span><span class="token punctuation">[</span><span class="token string">'username'</span><span class="token punctuation">]</span><span class="token punctuation">;</span>
    <span class="token variable">$_SESSION</span><span class="token punctuation">[</span><span class="token string">'access_level'</span><span class="token punctuation">]</span> <span class="token operator">=</span> <span class="token string">'admin'</span><span class="token punctuation">;</span>
    <span class="token function">header</span><span class="token punctuation">(</span><span class="token string">"Location: admin/admin_dashboard.html"</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token punctuation">}</span> <span class="token keyword">elseif</span> <span class="token punctuation">(</span><span class="token variable">$user</span><span class="token punctuation">[</span><span class="token string">'access_level'</span><span class="token punctuation">]</span> <span class="token operator">==</span> <span class="token string">'staff'</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
    <span class="token variable">$_SESSION</span><span class="token punctuation">[</span><span class="token string">'user_id'</span><span class="token punctuation">]</span> <span class="token operator">=</span> <span class="token variable">$user</span><span class="token punctuation">[</span><span class="token string">'id'</span><span class="token punctuation">]</span><span class="token punctuation">;</span>
    <span class="token variable">$_SESSION</span><span class="token punctuation">[</span><span class="token string">'username'</span><span class="token punctuation">]</span> <span class="token operator">=</span> <span class="token variable">$user</span><span class="token punctuation">[</span><span class="token string">'username'</span><span class="token punctuation">]</span><span class="token punctuation">;</span>
    <span class="token variable">$_SESSION</span><span class="token punctuation">[</span><span class="token string">'access_level'</span><span class="token punctuation">]</span> <span class="token operator">=</span> <span class="token string">'staff'</span><span class="token punctuation">;</span>
    <span class="token function">header</span><span class="token punctuation">(</span><span class="token string">"Location: staff/staff_dashboard.html"</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token punctuation">}</span> <span class="token keyword">else</span> <span class="token punctuation">{</span>
    <span class="token variable">$_SESSION</span><span class="token punctuation">[</span><span class="token string">'user_id'</span><span class="token punctuation">]</span> <span class="token operator">=</span> <span class="token variable">$user</span><span class="token punctuation">[</span><span class="token string">'id'</span><span class="token punctuation">]</span><span class="token punctuation">;</span>
    <span class="token variable">$_SESSION</span><span class="token punctuation">[</span><span class="token string">'username'</span><span class="token punctuation">]</span> <span class="token operator">=</span> <span class="token variable">$user</span><span class="token punctuation">[</span><span class="token string">'username'</span><span class="token punctuation">]</span><span class="token punctuation">;</span>
    <span class="token variable">$_SESSION</span><span class="token punctuation">[</span><span class="token string">'access_level'</span><span class="token punctuation">]</span> <span class="token operator">=</span> <span class="token string">'normal'</span><span class="token punctuation">;</span>
    <span class="token function">header</span><span class="token punctuation">(</span><span class="token string">"Location: user/user_dashboard.html"</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token punctuation">}</span>
</code></pre>
<h3 id="using-session-data-in-dashboards">8.3 Using Session Data in Dashboards</h3>
<p>In your dashboard pages (<code>user_dashboard.html</code>, <code>staff_dashboard.html</code>, <code>admin_dashboard.html</code>), you can now access the user’s information stored in the session.</p>
<pre class=" language-php"><code class="prism  language-php"><span class="token php language-php"><span class="token delimiter important">&lt;?php</span>
    <span class="token function">session_start</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

    <span class="token comment">// Check if user is logged in, if not redirect to login page</span>
    <span class="token keyword">if</span><span class="token punctuation">(</span><span class="token operator">!</span><span class="token function">isset</span><span class="token punctuation">(</span><span class="token variable">$_SESSION</span><span class="token punctuation">[</span><span class="token string">'username'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">)</span><span class="token punctuation">{</span>
        <span class="token function">header</span><span class="token punctuation">(</span><span class="token string">"Location: login.html"</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
    <span class="token punctuation">}</span>

    <span class="token comment">// Access session variables</span>
    <span class="token variable">$username</span> <span class="token operator">=</span> <span class="token variable">$_SESSION</span><span class="token punctuation">[</span><span class="token string">'username'</span><span class="token punctuation">]</span><span class="token punctuation">;</span>
    <span class="token variable">$access_level</span> <span class="token operator">=</span> <span class="token variable">$_SESSION</span><span class="token punctuation">[</span><span class="token string">'access_level'</span><span class="token punctuation">]</span><span class="token punctuation">;</span>
<span class="token delimiter important">?&gt;</span></span>
</code></pre>
<h3 id="implementing-logout">8.4 Implementing Logout</h3>
<ol>
<li><strong>Create a Logout Button</strong>:
<ul>
<li>In your dashboard pages, add a button or link that allows the user to log out.</li>
</ul>
</li>
</ol>
<pre class=" language-html"><code class="prism  language-html"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>a</span> <span class="token attr-name">href</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>logout.php<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Logout<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>a</span><span class="token punctuation">&gt;</span></span>
</code></pre>
<ol start="2">
<li><strong>Create Logout Script</strong>:
<ul>
<li>Create a new PHP file (e.g., <code>logout.php</code>) that will handle the logout process.</li>
</ul>
</li>
</ol>
<pre class=" language-php"><code class="prism  language-php"><span class="token php language-php"><span class="token delimiter important">&lt;?php</span>
    <span class="token function">session_start</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
    <span class="token function">session_destroy</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
    <span class="token function">header</span><span class="token punctuation">(</span><span class="token string">"Location: login.html"</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
    exit<span class="token punctuation">;</span>
<span class="token delimiter important">?&gt;</span></span>
</code></pre>
<h3 id="conclusion">Conclusion</h3>
<p>In this chapter, you’ve added session management to your web application. This allows you to maintain user authentication across multiple pages and access user-specific information. Additionally, you’ve implemented a logout feature to allow users to securely log out of their accounts.</p>
<p>The next chapters will focus on enhancing security measures, such as disabling directory listing, preventing SQL injection, and protecting against Cross-Site Scripting (XSS) attacks.</p>
<hr>

