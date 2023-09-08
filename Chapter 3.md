<hr>
<h2 id="chapter-3-setting-up-the-database">Chapter 3: Setting Up the Database</h2>
<h3 id="creating-a-mysql-database">3.1 Creating a MySQL Database</h3>
<p>A database is essential for storing user information. In this chapter, we’ll set up a MySQL database to store user data.</p>
<ol>
<li>
<p><strong>Accessing PHPMyAdmin</strong>:</p>
<ul>
<li>Open your web browser and go to <code>http://localhost/phpmyadmin</code>. Log in with the credentials you set during Laragon installation.</li>
</ul>
</li>
<li>
<p><strong>Creating a New Database</strong>:</p>
<ul>
<li>Click on the “Databases” tab in PHPMyAdmin.</li>
<li>Enter a name for your database (e.g., <code>webapp_db</code>) and select the collation (usually <code>utf8mb4_unicode_ci</code> for general purposes).</li>
<li>Click “Create”.</li>
</ul>
</li>
</ol>
<h3 id="designing-the-user-table-schema">3.2 Designing the User Table Schema</h3>
<p>Now that we have a database, let’s design the user table.</p>
<ol>
<li>
<p><strong>Select the Database</strong>:</p>
<ul>
<li>On the left sidebar of PHPMyAdmin, select the database you just created (<code>webapp_db</code>).</li>
</ul>
</li>
<li>
<p><strong>Creating the User Table</strong>:</p>
<ul>
<li>Click on the “SQL” tab in PHPMyAdmin.</li>
</ul>
<pre class=" language-sql"><code class="prism  language-sql"><span class="token keyword">CREATE</span> <span class="token keyword">TABLE</span> users <span class="token punctuation">(</span>
    id <span class="token keyword">INT</span> <span class="token keyword">PRIMARY</span> <span class="token keyword">KEY</span> <span class="token keyword">AUTO_INCREMENT</span><span class="token punctuation">,</span>
    username <span class="token keyword">VARCHAR</span><span class="token punctuation">(</span><span class="token number">50</span><span class="token punctuation">)</span> <span class="token keyword">UNIQUE</span> <span class="token operator">NOT</span> <span class="token boolean">NULL</span><span class="token punctuation">,</span>
    password <span class="token keyword">VARCHAR</span><span class="token punctuation">(</span><span class="token number">255</span><span class="token punctuation">)</span> <span class="token operator">NOT</span> <span class="token boolean">NULL</span><span class="token punctuation">,</span>
    email <span class="token keyword">VARCHAR</span><span class="token punctuation">(</span><span class="token number">100</span><span class="token punctuation">)</span> <span class="token keyword">UNIQUE</span> <span class="token operator">NOT</span> <span class="token boolean">NULL</span><span class="token punctuation">,</span>
    access_level <span class="token keyword">ENUM</span><span class="token punctuation">(</span><span class="token string">'normal'</span><span class="token punctuation">,</span> <span class="token string">'staff'</span><span class="token punctuation">,</span> <span class="token string">'admin'</span><span class="token punctuation">)</span> <span class="token keyword">DEFAULT</span> <span class="token string">'normal'</span>
<span class="token punctuation">)</span><span class="token punctuation">;</span>
</code></pre>
<p>This SQL statement creates a table named <code>users</code> with fields for <code>id</code>, <code>username</code>, <code>password</code>, <code>email</code>, and <code>access_level</code>.</p>
</li>
</ol>
<h3 id="inserting-sample-data">3.3 Inserting Sample Data</h3>
<p>To test the login functionality, let’s add some sample data.</p>
<ol>
<li>
<p><strong>Inserting Data</strong>:</p>
<ul>
<li>Still in the “SQL” tab, run the following SQL statements:</li>
</ul>
<pre class=" language-sql"><code class="prism  language-sql"><span class="token keyword">INSERT</span> <span class="token keyword">INTO</span> users <span class="token punctuation">(</span>username<span class="token punctuation">,</span> password<span class="token punctuation">,</span> email<span class="token punctuation">,</span> access_level<span class="token punctuation">)</span>
<span class="token keyword">VALUES</span> <span class="token punctuation">(</span><span class="token string">'john_doe'</span><span class="token punctuation">,</span> <span class="token string">'password123'</span><span class="token punctuation">,</span> <span class="token string">'john@example.com'</span><span class="token punctuation">,</span> <span class="token string">'admin'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>

<span class="token keyword">INSERT</span> <span class="token keyword">INTO</span> users <span class="token punctuation">(</span>username<span class="token punctuation">,</span> password<span class="token punctuation">,</span> email<span class="token punctuation">,</span> access_level<span class="token punctuation">)</span>
<span class="token keyword">VALUES</span> <span class="token punctuation">(</span><span class="token string">'jane_doe'</span><span class="token punctuation">,</span> <span class="token string">'letmein'</span><span class="token punctuation">,</span> <span class="token string">'jane@example.com'</span><span class="token punctuation">,</span> <span class="token string">'normal'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
</code></pre>
<p>These statements insert two sample users into the <code>users</code> table.</p>
</li>
</ol>
<h3 id="conclusion">Conclusion</h3>
<p>In this chapter, you’ve set up a MySQL database and created a user table to store user information. The table includes fields for <code>id</code>, <code>username</code>, <code>password</code>, <code>email</code>, and <code>access_level</code>. Additionally, you’ve inserted sample data for testing purposes.</p>
<p>In the next chapters, we’ll integrate the login page with the database to enable user authentication.</p>
<hr>

