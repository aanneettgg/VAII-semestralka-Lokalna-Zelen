<footer class="footer <?php if($page == 'kontakt.php'){ echo ' footer-bottom"';}?>">
    <ul>
        <a href="https://www.facebook.com/lokalnazelen/" target="_blank"
            class="fa fa-facebook"></a>
        <a href="https://www.instagram.com/lokalna_zelen/" target="_blank"
            class="fa fa-instagram"></a>
    </ul>

    <ul>
        <p class="copyright">©2021 Lokálna zeleň</p>
        <p>Design: Aneta Gábrišová</p>
    </ul>
</footer>

<script>
    function myFunction() {
      var x = document.getElementById("navbar");
      if (x.className === "navbar1") {
        x.className += " responsive";
      } else {
        x.className = "navbar1";
      }
    }
</script>