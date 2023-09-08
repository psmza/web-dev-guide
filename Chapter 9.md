<hr>
<h2 id="chapter-9-security-measures">Chapter 9: Security Measures</h2>
<h3 id="disabling-directory-listing">9.1 Disabling Directory Listing</h3>
<p>By default, web servers may allow directory listing, which exposes the contents of directories to users. This can be a security risk, especially if sensitive files are accessible.</p>
<ol>
<li>
<p><strong>Using .htaccess File</strong>:</p>
<ul>
<li>Create an <code>.htaccess</code> file in the directory you want to protect. If one already exists, open it.</li>
</ul>
</li>
<li>
<p><strong>Add Directive</strong>:</p>
<ul>
<li>Add the following line to your <code>.htaccess</code> file:</li>
</ul>
</li>
</ol>
<pre class=" language-apache"><code class="prism  language-apache">Options -Indexes
DirectoryIndex login.php
</code></pre>
<p>This directive tells Apache to disable directory listing for the current directory and its subdirectories.</p>
<h3 id="preventing-sql-injection">9.2 Preventing SQL Injection</h3>
<p>SQL injection attacks occur when malicious SQL code is injected into user input fields, potentially leading to unauthorized access or data loss.</p>
<ol>
<li><strong>Use Prepared Statements</strong>:
<ul>
<li>When executing SQL queries in your PHP code, use prepared statements and parameterized queries to prevent SQL injection.</li>
</ul>
</li>
</ol>
<pre class=" language-php"><code class="prism  language-php"><span class="token variable">$username</span> <span class="token operator">=</span> <span class="token variable">$_POST</span><span class="token punctuation">[</span><span class="token string">'username'</span><span class="token punctuation">]</span><span class="token punctuation">;</span>
<span class="token variable">$password</span> <span class="token operator">=</span> <span class="token variable">$_POST</span><span class="token punctuation">[</span><span class="token string">'password'</span><span class="token punctuation">]</span><span class="token punctuation">;</span>

<span class="token variable">$stmt</span> <span class="token operator">=</span> <span class="token variable">$conn</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">prepare</span><span class="token punctuation">(</span><span class="token string">"SELECT * FROM users WHERE username=? AND password=?"</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token variable">$stmt</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">bind_param</span><span class="token punctuation">(</span><span class="token string">"ss"</span><span class="token punctuation">,</span> <span class="token variable">$username</span><span class="token punctuation">,</span> <span class="token variable">$password</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token variable">$stmt</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">execute</span><span class="token punctuation">(</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
</code></pre>
<ol start="2">
<li><strong>Sanitize User Input</strong>:</li>
</ol>
<pre class=" language-php"><code class="prism  language-php"><span class="token variable">$username</span> <span class="token operator">=</span> <span class="token function">mysqli_real_escape_string</span><span class="token punctuation">(</span><span class="token variable">$conn</span><span class="token punctuation">,</span> <span class="token variable">$_POST</span><span class="token punctuation">[</span><span class="token string">'username'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token variable">$password</span> <span class="token operator">=</span> <span class="token function">mysqli_real_escape_string</span><span class="token punctuation">(</span><span class="token variable">$conn</span><span class="token punctuation">,</span> <span class="token variable">$_POST</span><span class="token punctuation">[</span><span class="token string">'password'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
</code></pre>
<h3 id="protecting-against-cross-site-scripting-xss-attacks">9.3 Protecting Against Cross-Site Scripting (XSS) Attacks</h3>
<p>XSS attacks occur when malicious scripts are injected into web pages, potentially stealing sensitive information or performing harmful actions on behalf of the user.</p>
<ol>
<li><strong>Escape User Input</strong>:
<ul>
<li>Use functions like <code>htmlspecialchars</code> in PHP to escape special characters before displaying user-generated content.</li>
</ul>
</li>
</ol>
<pre class=" language-php"><code class="prism  language-php"><span class="token variable">$name</span> <span class="token operator">=</span> <span class="token function">htmlspecialchars</span><span class="token punctuation">(</span><span class="token variable">$_GET</span><span class="token punctuation">[</span><span class="token string">'name'</span><span class="token punctuation">]</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
</code></pre>
<ol start="2">
<li><strong>Implement Content Security Policies (CSP)</strong>:
<ul>
<li>Utilize HTTP headers to enforce content security policies that restrict the sources of content that can be loaded on your pages.</li>
</ul>
</li>
</ol>
<h3 id="conclusion">Conclusion</h3>
<p>In this chapter, you’ve implemented crucial security measures to protect your web application. These measures include disabling directory listing using the <code>.htaccess</code> file, using prepared statements and input sanitization to prevent SQL injection attacks, and applying strategies to safeguard against Cross-Site Scripting (XSS) attacks.</p>
<p>The next chapters will focus on enhancing the user interface by adding CSS using Bootstrap and/or Material Design, creating an appealing and user-friendly design.</p>
<hr>

