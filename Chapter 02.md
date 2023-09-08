<hr>
<h2 id="chapter-2-creating-the-login-page">Chapter 2: Creating the Login Page</h2>
<h3 id="creating-a-basic-html-file-for-login">2.1 Creating a Basic HTML File for Login</h3>
<p>The login page is a crucial part of any web application. In this chapter, we will create a simple HTML file to serve as the login interface.</p>
<ol>
<li>
<p><strong>Open Your Text Editor</strong>:</p>
<ul>
<li>Open your preferred text editor (e.g., Visual Studio Code, Sublime Text, Notepad++).</li>
</ul>
</li>
<li>
<p><strong>Create a New HTML File</strong>:</p>
<ul>
<li>Create a new file and save it with a descriptive name like <code>login.html</code>.</li>
</ul>
</li>
<li>
<p><strong>Basic HTML Structure</strong>:</p>
<ul>
<li>Start with the basic HTML structure:</li>
</ul>
</li>
</ol>
<pre class=" language-html"><code class="prism  language-html"><span class="token doctype">&lt;!DOCTYPE html&gt;</span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>html</span> <span class="token attr-name">lang</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>en<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>head</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>meta</span> <span class="token attr-name">charset</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>UTF-8<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>meta</span> <span class="token attr-name">name</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>viewport<span class="token punctuation">"</span></span> <span class="token attr-name">content</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>width=device-width, initial-scale=1.0<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>title</span><span class="token punctuation">&gt;</span></span>Login Page<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>title</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>head</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>body</span><span class="token punctuation">&gt;</span></span>
    <span class="token comment">&lt;!-- Login Form Goes Here --&gt;</span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>body</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>html</span><span class="token punctuation">&gt;</span></span>
</code></pre>
<h3 id="adding-form-elements">2.2 Adding Form Elements</h3>
<p>Next, we’ll add form elements for the username and password fields, as well as a submit button.</p>
<pre class=" language-html"><code class="prism  language-html"><span class="token comment">&lt;!-- Inside the &lt;body&gt; section --&gt;</span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>form</span> <span class="token attr-name">action</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>process_login.php<span class="token punctuation">"</span></span> <span class="token attr-name">method</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>post<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>label</span> <span class="token attr-name">for</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>username<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Username:<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>label</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>input</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>text<span class="token punctuation">"</span></span> <span class="token attr-name">id</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>username<span class="token punctuation">"</span></span> <span class="token attr-name">name</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>username<span class="token punctuation">"</span></span> <span class="token attr-name">required</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>br</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>br</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>label</span> <span class="token attr-name">for</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>password<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Password:<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>label</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>input</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>password<span class="token punctuation">"</span></span> <span class="token attr-name">id</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>password<span class="token punctuation">"</span></span> <span class="token attr-name">name</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>password<span class="token punctuation">"</span></span> <span class="token attr-name">required</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>br</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>br</span><span class="token punctuation">&gt;</span></span>
    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>input</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>submit<span class="token punctuation">"</span></span> <span class="token attr-name">value</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>Login<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>form</span><span class="token punctuation">&gt;</span></span>
</code></pre>
<p>Here’s what we’ve done:</p>
<ul>
<li>Created a <code>&lt;form&gt;</code> element that will submit data to a file named <code>process_login.php</code>.</li>
<li>Added <code>&lt;label&gt;</code> elements for the username and password fields to provide context for the user.</li>
<li>Added <code>&lt;input&gt;</code> elements for the username and password fields, with appropriate <code>id</code>, <code>name</code>, and <code>type</code> attributes.</li>
<li>Included a submit button (<code>&lt;input type="submit"&gt;</code>) to trigger the form submission.</li>
</ul>
<h3 id="creating-the-process_login.php-file">2.3 Creating the <code>process_login.php</code> File</h3>
<p>We’ve set the form’s action to <code>process_login.php</code>. Now, let’s create this file to handle form submission and authentication:</p>
<ol>
<li>
<p><strong>Create <code>process_login.php</code></strong>:</p>
<ul>
<li>In the same directory as <code>login.html</code>, create a new PHP file named <code>process_login.php</code>.</li>
</ul>
</li>
<li>
<p><strong>Handling Form Submission</strong>:</p>
<ul>
<li>In <code>process_login.php</code>, you’ll write PHP code to process the submitted form data. This will typically involve checking the entered username and password against your database.</li>
</ul>
</li>
</ol>
<pre class=" language-php"><code class="prism  language-php"><span class="token php language-php"><span class="token delimiter important">&lt;?php</span>
    <span class="token comment">// Retrieve username and password from the form submission</span>
    <span class="token variable">$username</span> <span class="token operator">=</span> <span class="token variable">$_POST</span><span class="token punctuation">[</span><span class="token string">'username'</span><span class="token punctuation">]</span><span class="token punctuation">;</span>
    <span class="token variable">$password</span> <span class="token operator">=</span> <span class="token variable">$_POST</span><span class="token punctuation">[</span><span class="token string">'password'</span><span class="token punctuation">]</span><span class="token punctuation">;</span>
    <span class="token comment">// Perform authentication (e.g., check against database)</span>
    <span class="token comment">// If authenticated, redirect to user dashboard</span>
    <span class="token comment">// Otherwise, display an error message</span>
<span class="token delimiter important">?&gt;</span></span>
</code></pre>
<h3 id="conclusion">Conclusion</h3>
<p>In this chapter, you’ve created a basic HTML file for the login page. The form elements have been set up to gather the username and password input from the user. In the next chapter, we’ll dive into setting up the database and user table to handle the authentication process.</p>
<hr>

