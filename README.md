<h1 class="code-line" data-line-start=0 data-line-end=1 ><a id="GOODWILL_0"></a>GOODWILL</h1>
<h2 class="code-line" data-line-start=1 data-line-end=2 ><a id="FILTER_USER_BY_TERRITORY_1"></a>FILTER USER BY TERRITORY</h2>
<p class="has-line-data" data-line-start="4" data-line-end="5">This tool makes it possible to set up the elected representatives of a territory in relation to a list of articles where they are mentioned. items can be articles, press, archives, administrative documents, etc.</p>
<h2 class="code-line" data-line-start=6 data-line-end=7 ><a id="Features_6"></a>Features</h2>
<ul>
<li class="has-line-data" data-line-start="8" data-line-end="9">Filter by territory(departement, region,…)</li>
<li class="has-line-data" data-line-start="9" data-line-end="11">Search article by name of elected people.</li>
</ul>
<h2 class="code-line" data-line-start=11 data-line-end=12 ><a id="Tech_11"></a>Tech</h2>
<p class="has-line-data" data-line-start="13" data-line-end="14">These technologies were used in this project:</p>
<ul>
<li class="has-line-data" data-line-start="15" data-line-end="16">[Bootstrap] - organize and layout the front interface.</li>
<li class="has-line-data" data-line-start="16" data-line-end="17">[Ajax] - communication channel with api.</li>
<li class="has-line-data" data-line-start="17" data-line-end="18">[JQuery] - to interact with the user</li>
<li class="has-line-data" data-line-start="18" data-line-end="19">[Php 8.1] - data processing on the backend side</li>
<li class="has-line-data" data-line-start="19" data-line-end="20">[Doctrine] - Object Relational Mapping for manange database</li>
<li class="has-line-data" data-line-start="20" data-line-end="21">[PhpUnit] - to perform unit tests</li>
<li class="has-line-data" data-line-start="21" data-line-end="23">[Composer] - allow to install all dependencie</li>
</ul>
<h2 class="code-line" data-line-start=23 data-line-end=24 ><a id="Installation_23"></a>Installation</h2>
<p class="has-line-data" data-line-start="25" data-line-end="26">This component requires [Php 8.*] to run.</p>
<p class="has-line-data" data-line-start="27" data-line-end="28">Install the dependencies before to start the server.</p>
<h4 class="code-line" data-line-start=28 data-line-end=29 ><a id="Composer_installation_28"></a>Composer installation</h4>
<pre><code class="has-line-data" data-line-start="30" data-line-end="33" class="language-sh">sudo apt update
apt install composer
</code></pre>
<h4 class="code-line" data-line-start=34 data-line-end=35 ><a id="PHP_intallation_34"></a>PHP intallation</h4>
<pre><code class="has-line-data" data-line-start="36" data-line-end="41" class="language-sh">sudo apt update
sudo apt install lsb-release ca-certificates apt-transport-https software-properties-common -y
sudo add-apt-repository ppa:ondrej/php
sudo apt install php8.<span class="hljs-number">0</span>
</code></pre>
<h4 class="code-line" data-line-start=41 data-line-end=42 ><a id="Apache_and_git_41"></a>Apache and git</h4>
<pre><code class="has-line-data" data-line-start="43" data-line-end="48" class="language-sh">apt install apache2
rm -R /var/www/html/ &amp;&amp; <span class="hljs-built_in">cd</span> /var/www/html
apt install git
git <span class="hljs-built_in">clone</span> [repository_url] .
</code></pre>
<h4 class="code-line" data-line-start=48 data-line-end=49 ><a id="Clone_projet_48"></a>Clone projet</h4>
<pre><code class="has-line-data" data-line-start="50" data-line-end="52" class="language-sh">git <span class="hljs-built_in">clone</span> [repository_url] .
</code></pre>
<h4 class="code-line" data-line-start=53 data-line-end=54 ><a id="Other_step_for_install_53"></a>Other step for install</h4>
<ul>
<li class="has-line-data" data-line-start="54" data-line-end="55">install composer</li>
<li class="has-line-data" data-line-start="55" data-line-end="56">update schema database with doctrine</li>
<li class="has-line-data" data-line-start="56" data-line-end="58">import data for demo</li>
</ul>
<h1 class="code-line" data-line-start=58 data-line-end=59 ><a id="Possible_improvements_58"></a>Possible improvements</h1>
<p class="has-line-data" data-line-start="59" data-line-end="60">Several areas for improvement are possible, whether it is the architecture of the database, the search algorithm, etc…</p>
<ul>
<li class="has-line-data" data-line-start="61" data-line-end="62">[Database] - The database schema could be more efficient, splitting the database by territory level rather than by type.</li>
<li class="has-line-data" data-line-start="62" data-line-end="63">[Performance] - Find a mathematical algorithm that can be integrated into the system to improve search performance.</li>
<li class="has-line-data" data-line-start="63" data-line-end="64">[Performance] - On this demo, we should untie the database of articles to a territory (an afterthought)</li>
<li class="has-line-data" data-line-start="64" data-line-end="66">[PHP] - PHP is not the best programmatically language for data.</li>
</ul>
<h4 class="code-line" data-line-start=66 data-line-end=67 ><a id="Consult_demo_66"></a>Consult demo</h4>
<p class="has-line-data" data-line-start="67" data-line-end="68"><a href="http://217.160.44.105/basic-front.html">http://217.160.44.105/basic-front.html</a></p>