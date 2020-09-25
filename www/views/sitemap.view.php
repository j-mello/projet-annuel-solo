<div class="dashboard-section">
    <div class="row">
        <div class="col-md-12">
        <h1 class="text-center text-upercase">Sitemap.xml : </h1>
    </div>
</div>

<div class="col-md-12">
    <pre>
        <a class="button" href="./sitemap.xml" download> Téléchargez le sitemap </a></pre>
    
    <?php
        $date = date('Y-m-d H:i', time());
        $domaine = $_SERVER['HTTP_HOST'];
        echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
        <urlset
            xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\"
                xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\"
                xsi:schemaLocation=\"http://www.sitemaps.org/schemas/sitemap/0.9
                http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd\">

            <pre>
            <url>
                <loc>$domaine/</loc>
                <lastmod>".$date."</lastmod>
                <priority>1.00</priority>
            </url>
            <url>
                <loc>$domaine/login</loc>
                <lastmod>".$date."</lastmod>
                <priority>0.80</priority>
            </url>
            <url>
                <loc>$domaine/register</loc>
                <lastmod>".$date."</lastmod>
                <priority>0.80</priority>
            </url>";
    foreach ($pages as $page){
        echo "<url>
                <loc>$domaine".$page->getUri()."</loc>
                <lastmod>".$page->getCreated_at()."</lastmod>
                <priority>0.70</priority>
            </url>
        ";
    }
    ?>
    </urlset>
    </pre>
</div>
</div>
