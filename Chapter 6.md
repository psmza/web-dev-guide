<hr>
<h2 id="chapter-6-implementing-user-dashboards">Chapter 6: Implementing User Dashboards</h2>
<h3 id="creating-dashboard-pages">6.1 Creating Dashboard Pages</h3>
<p>In this section, we’ll create separate dashboard pages for each user type (normal user, staff user, admin user).</p>
<ol>
<li>
<p><strong>Create Dashboard Files</strong>:</p>
<ul>
<li>Within the respective folders (<code>user</code>, <code>staff</code>, <code>admin</code>), create HTML files for the dashboards. For example:
<ul>
<li><code>user_dashboard.html</code> for normal users.</li>
<li><code>staff_dashboard.html</code> for staff users.</li>
<li><code>admin_dashboard.html</code> for admin users.</li>
</ul>
</li>
</ul>
</li>
<li>
<p><strong>Design the Dashboards</strong>:</p>
<ul>
<li>In each HTML file, design the dashboard interface. Include elements like navigation menus, user information, and any specific features or options related to the user’s role.</li>
</ul>
</li>
</ol>
<h3 id="linking-dashboards-to-login">6.2 Linking Dashboards to Login</h3>
<p>Next, we’ll modify the <code>process_login.php</code> file to redirect users to their respective dashboards based on their access level.</p>
<ol>
<li><strong>Update the Redirects</strong>:
<ul>
<li>In <code>process_login.php</code>, after validating the user’s credentials, modify the redirect paths to send users to their corresponding dashboards:</li>
</ul>
</li>
</ol>
<pre class=" language-php"><code class="prism  language-php"><span class="token keyword">if</span> <span class="token punctuation">(</span><span class="token variable">$user</span><span class="token punctuation">[</span><span class="token string">'access_level'</span><span class="token punctuation">]</span> <span class="token operator">==</span> <span class="token string">'admin'</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
    <span class="token function">header</span><span class="token punctuation">(</span><span class="token string">"Location: admin/admin_dashboard.html"</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token punctuation">}</span> <span class="token keyword">elseif</span> <span class="token punctuation">(</span><span class="token variable">$user</span><span class="token punctuation">[</span><span class="token string">'access_level'</span><span class="token punctuation">]</span> <span class="token operator">==</span> <span class="token string">'staff'</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
    <span class="token function">header</span><span class="token punctuation">(</span><span class="token string">"Location: staff/staff_dashboard.html"</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token punctuation">}</span> <span class="token keyword">else</span> <span class="token punctuation">{</span>
    <span class="token function">header</span><span class="token punctuation">(</span><span class="token string">"Location: user/user_dashboard.html"</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
<span class="token punctuation">}</span>
</code></pre>
<h3 id="conclusion">Conclusion</h3>
<p>In this chapter, you’ve created separate dashboard pages for different user types: normal users, staff users, and admin users. You’ve also updated the login process to redirect users to their respective dashboards based on their access level.</p>
<p>The next chapters will focus on implementing CRUD (Create, Read, Update, Delete) operations for each user type, allowing users to interact with the application.</p>
<hr>

