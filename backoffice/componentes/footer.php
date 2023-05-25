        <footer>
            &copy Paulo Moreira 2023 - Todos os direitos Reservados
        </footer>
    <script src="../../config/main.js"></script>   
    <script>
        function sizeCheck(){
            let windowSize = window.innerWidth;
            var nav = document.querySelector("nav > ul")
            var toggler = document.querySelector("#backoffice_toggle")

            if(windowSize > 1060){
                nav.style.display = "flex"
            }
            else{
                nav.style.display = "none"
                toggler.setAttribute("src", "../../recursos/imagens_para_site/desktop/menu.svg")
                menutoggler = false;
            }
        }

        window.addEventListener('resize', sizeCheck)
    </script>
    </body>
</html>