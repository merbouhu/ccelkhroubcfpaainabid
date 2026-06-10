<footer class="main-footer">
    <div class="footer-container">
        <div class="footer-info">
            <h3><?php echo $content[$lang]['title']; ?></h3>
            <p><strong><?php echo $content[$lang]['address_label']; ?></strong><br>
            <?php echo $content[$lang]['address_text']; ?></p>
            <p><strong><?php echo $content[$lang]['phone_label']; ?></strong><br>
            031.99.99.99</p>
        </div>

        <div class="footer-map">
            <h4><?php echo $content[$lang]['map_title']; ?></h4>
            <div class="map-responsive">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3217.206360894053!2d6.698987274010999!3d36.25876862240641!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12f1727ca75adfc9%3A0x2e97485b8941e5d4!2s7P52%2BGHH%20Ctre%20culturel%20Mohamed%20El-yazid%2C%20El%20Khroub!5e0!3m2!1sfr!2sdz!4v1778676706722!5m2!1sfr!2sdz" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <a href="https://www.google.com/maps/dir//Centre+Culturel+M'hamed+El+Yazid,+7P52%2B8MQ,+El+Khroub,+Algeria/data=!4m9!4m8!1m0!1m5!1m1!19sChIJl5eGmHxy8RIROZvwFXmJ_tM!2m2!1d6.7017259!2d36.2583412!3e0" target="_blank" class="btn-trip">
               <i class="fas fa-route"></i> <?php echo $content[$lang]['get_directions']; ?>
            </a>
        </div>
    </div>
    <div class="footer-bottom">
        © 2026 <?php echo $content[$lang]['title']; ?> - Stage de fin d'études
    </div>
</footer>