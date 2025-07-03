<!-- <script>
    document.getElementById("btn-change-theme").addEventListener("click",(e) => {
        const $html = document.documentElement
        const $icon = document.getElementById("icon-theme")
        const temaActual = $html.getAttribute("data-theme")
        if(temaActual == "dark"){
            $html.setAttribute("data-theme", "light")
            $icon.classList.replace("fa-sun", "fa-moon")
        }else{
            $html.setAttribute("data-theme", "dark")
            $icon.classList.replace("fa-moon", "fa-sun")
        }
    })
</script> -->
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<script>
  const notyf = new Notyf()
    <?php if (!empty($error)): ?>
      notyf.error("<?= $error ?>")
    <?php endif; ?>
</script>
</body>
</html>
