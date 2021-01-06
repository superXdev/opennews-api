<!DOCTYPE html>
<html lang="en">
<head>
    <title>OpenNews API documentation</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">    
    <link rel="shortcut icon" href="favicon.ico">  
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <!-- FontAwesome JS -->
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>
    <!-- Global CSS -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">   
    <!-- Plugins CSS -->    
    <link rel="stylesheet" href="assets/plugins/prism/prism.css">
    <link rel="stylesheet" href="assets/plugins/elegant_font/css/style.css">  
      
    <!-- Theme CSS -->
    <link id="theme-style" rel="stylesheet" href="assets/css/styles.css">
    
</head> 

<body class="body-green">
    <div class="page-wrapper">
        <!-- ******Header****** -->
        <header id="header" class="header">
            <div class="container">
                <div class="branding">
                    <h1 class="logo">
                        <a href="index.html">
                            <span class="text-highlight">Open</span><span class="text-bold">News</span>
                        </a>
                    </h1>
                    
                </div><!--//branding-->
                
                
            </div><!--//container-->
        </header><!--//header-->
        <div class="doc-wrapper bg-white">
            <div class="container">
                <div id="doc-header" class="doc-header text-center">
                    <div class="meta"><i class="far fa-clock"></i> Last updated: Jan 5th, 2021</div>
                </div><!--//doc-header-->
                <div class="doc-body row">
                    <div class="doc-content col-md-9 col-12 order-1">
                        <div class="content-inner">
                            <section id="overview-section" class="doc-section">
                                <h2 class="section-title">Overview</h2>
                                <div class="section-block">
                                    <p>
                                    This documentation is intended for developers who want to write applications that can query OpenNews.
                                    We serve our data in JSON formats via a simple URL-based interface over HTTP, which enables you to use our data directly from a user's browser or from your server. 
                                                                        </p>
                                </div>
                            </section><!--//doc-section-->
                            <section id="news-section" class="doc-section">
                                <h2 class="section-title">All News</h2>
                                <div id="s1"  class="section-block">
                                    <h3 class="block-title">The API path</h3>
                                    <code>https://opennewsapi.herokuapp.com/api/news</code>

                                </div><!--//section-block-->
                                <div id="s2"  class="section-block">
                                    <h3 class="block-title">Parameters</h3>
                                    <p>Query parameters are appended as GET request parameters, for example:</p>
                                    <p class="text-danger">
                                        https://opennewsapi.herokuapp.com/api/news?order_by=popular&limit=20
                                    </p>
                                    <table class="table">
                                        <tr>
                                            <td>order_by</td>
                                            <td>optional, example: latest, popular, oldest</td>
                                        </tr>
                                        <tr>
                                            <td>tag</td>
                                            <td>optional, example: News, Olahraga</td>
                                        </tr>
                                        <tr>
                                            <td>keyword</td>
                                            <td>optional, depend on title example: pernikahan, what if</td>
                                        </tr>
                                        <tr>
                                            <td>source</td>
                                            <td>optional, example: cnn, kompas</td>
                                        </tr>
                                        <tr>
                                            <td>limit</td>
                                            <td>optional, how many news to show</td>
                                        </tr>
                                        <tr>
                                            <td>page</td>
                                            <td>optional</td>
                                        </tr>
                                    </table>
                                </div><!--//section-block-->
                                <div id="s3"  class="section-block">
                                    <h3 class="block-title">API response</h3>
                                    <div class="code-block">
                                        <pre><code class="language-javascript">
{
    "results": [
        {
            "id": 4179,
            "title": "Chacha Sherly Meninggal akibat Kecelakaan Usai Bertemu Orangtua untuk Melepas Rindu",
            "image": "https://asset.kompas.com/crops/L3Km6PQ2BuKU_VsGEx2UMBxh_ME=/0x162:576x546/177x117/data/photo/2021/01/05/5ff4115c1e5e3.png",
            "link": "https://opennewsapi.herokuapp.com/go/4179",
            "tag": "News",
            "source": "kompas",
            "views": 0,
            "created_at": "2021-01-05T01:07:21.000000Z"
        },
        ...
    ],
    "pages": 523
}
                                        </code></pre>
                                    </div><!--//code-block-->
                                </div><!--//section-block-->
                            </section><!--//doc-section-->
                            
                            <section id="tags-section" class="doc-section">
                                <h2 class="section-title">Tags list</h2>
                                <div class="section-block">
                                    You can use this tag with parameter <span class="text-danger">tag</span>
                                    
                                </div><!--//section-block-->
                                <div id="s4" class="section-block">
                                    <h3>The API path</h3>
                                    <code>https://opennewsapi.herokuapp.com/api/tags</code>
                                </div><!--//section-block-->
                                <div id="s5" class="section-block">
                                    <h3>Parameters</h3>
                                    <p>Nothing parameters</p>
                                </div><!--//section-block-->
                                <div id="less" class="section-block">
                                    <div class="code-block">
                                        <h3>API response</h3>
                                        <pre><code class="language-javascript">
[
    {
        "tag": "News",
        "total": 796
    },
    {
        "tag": "Hype",
        "total": 289
    },
    {
        "tag": "Kompas.Id Premium",
        "total": 265
    },
    ...
]
                                        </code></pre>
                                    </div><!--//code-block-->
                                </div><!--//section-block-->
                                
                            </section><!--//doc-section-->
                            <section id="stats-section" class="doc-section">
                                <h2 class="section-title">Statistics</h2>
                                <div class="section-block">
                                    Show the statistics of API
                                    
                                </div><!--//section-block-->
                                <div id="s6" class="section-block">
                                    <h3>The API path</h3>
                                    <code>https://opennewsapi.herokuapp.com/api/stats</code>
                                </div><!--//section-block-->
                                <div id="s7" class="section-block">
                                    <h3>Parameters</h3>
                                    <p>Nothing parameters</p>
                                </div><!--//section-block-->
                                <div id="s8" class="section-block">
                                    <div class="code-block">
                                        <h3>API response</h3>
                                        <pre><code class="language-javascript">
{
    "total_views": 3,
    "api_hits": 329,
    "total_news": 4203,
    "news_today": 887
}
                                        </code></pre>
                                    </div><!--//code-block-->
                                </div><!--//section-block-->
                                
                            </section><!--//doc-section-->
                             <section id="example-section" class="doc-section">
                                <h2 class="section-title">Example</h2>
                                <p>Here is the example of implementation this API</p>
                                <a href="http://opennews.netlify.app/">http://opennews.netlify.app/</a><br>
                                <a href="https://github.com/superXdev/opennews">Source code</a>
                            </section>
                            <section id="about-section" class="doc-section">
                                <h2 class="section-title">About</h2>

                                <div class="section-block">
                                    <div class="callout-block callout-info">
                                        <div class="icon-holder">
                                            <i class="fas fa-info-circle"></i>
                                        </div><!--//icon-holder-->
                                        <div class="content">
                                            <h4 class="callout-title">Information</h4>
                                            <p>This project is still in its early stages, I will develop it to be much bigger if many use this API or project</p>
                                        </div><!--//content-->
                                    </div><!--//callout-block-->
                                    <p>
                                        Linkedin: <a href="https://www.linkedin.com/in/fikri-rudiansyah-700b171b6/">https://www.linkedin.com/in/fikri-rudiansyah-700b171b6/</a>
                                    </p>
                                    <p>
                                        Personal web: <a href="http://fikridev.tech/">http://fikridev.tech/</a>
                                    </p>
                                    <p>
                                        Github: <a href="https://github.com/superXdev">https://github.com/superXdev</a>
                                    </p>
                                </div>
                            </section><!--//doc-section-->
                            
                            
                        </div><!--//content-inner-->
                    </div><!--//doc-content-->
                    <div class="doc-sidebar col-md-3 col-12 order-0 d-none d-md-flex">
                        <div id="doc-nav" class="doc-nav">
                            
                                <nav id="doc-menu" class="nav doc-menu flex-column sticky">
                                    <a class="nav-link scrollto" href="#overview-section">Overview</a>
                                    <a class="nav-link scrollto" href="#news-section">All News</a>
                                    <nav class="doc-sub-menu nav flex-column">
                                        <a class="nav-link scrollto" href="#s1">The API path</a>
                                        <a class="nav-link scrollto" href="#s2">Parameters</a>
                                        <a class="nav-link scrollto" href="#s3">API response</a>
                                    </nav><!--//nav-->
                                    <a class="nav-link scrollto" href="#tags-section">Tags list</a>
                                    <nav class="doc-sub-menu nav flex-column">
                                        <a class="nav-link scrollto" href="#s4">The API path</a>
                                        <a class="nav-link scrollto" href="#s5">API response</a>
                                    </nav><!--//nav-->
                                    <a class="nav-link scrollto" href="#stats-section">Statistics</a>
                                    <a class="nav-link scrollto" href="#example-section">Example</a>
                                    <a class="nav-link scrollto" href="#about-section">About</a>
                                </nav><!--//doc-menu-->
                            
                        </div>
                    </div><!--//doc-sidebar-->
                </div><!--//doc-body-->              
            </div><!--//container-->
        </div><!--//doc-wrapper-->
        
        
    </div><!--//page-wrapper-->
    
    <footer id="footer" class="footer text-center">
        <div class="container">
            <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
            <span class="copyright">Created with <i class="fas fa-heart"></i> by <a href="http://fikridev.tech/" target="_blank">Fikri R</a> for developers</span>
            
        </div><!--//container-->
    </footer><!--//footer-->
    
     
    <!-- Main Javascript -->          
    <script type="text/javascript" src="assets/plugins/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/plugins/prism/prism.js"></script>    
    <script type="text/javascript" src="assets/plugins/jquery-scrollTo/jquery.scrollTo.min.js"></script>      
    <script type="text/javascript" src="assets/plugins/stickyfill/dist/stickyfill.min.js"></script>                                                             
    <script type="text/javascript" src="assets/js/main.js"></script>
    
</body>
</html> 

