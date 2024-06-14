<!DOCTYPE html>
<html lang="en">

<head>
<?php
include 'newheader.php';
?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>
    <style>
        #pdfViewerWrapper {
            max-height: 80vh; /* Define a altura máxima */
            overflow-y: scroll; /* Adiciona a barra de rolagem vertical */
        }
        #pdfViewer canvas {
            display: block;
            margin: auto;
            margin-bottom: 10px;
            border: 1px solid black;
        }
        .controls {
            margin-bottom: 20px;
        }
        #currentPageDisplay {
            margin-left: 10px;
            font-size: 1.2em;
        }
    </style>
</head>

<body>
    <p></p>
    <div class="main p-3">
        <div class="text-center">
            <h1>EPBL Book 1</h1>
        </div>

        <div class="controls text-center">
            <button id="fullscreenButton" class="btn btn-primary">Tela Cheia</button>
            <input type="number" id="pageNumber" class="form-control d-inline-block w-auto" placeholder="Página" min="1">
            <button id="goToPageButton" class="btn btn-secondary">Página</button>
            
        </div>

        <div id="pdfViewerWrapper"> <!-- Nova div envolvendo o visualizador de PDF -->
            <div id="pdfViewer"></div>
        </div>

        <script>
            // URL do PDF que você deseja exibir
            var pdfUrl = 'book1/visualizar_pdf.php';

            // Configurações de visualização do PDF
            var viewerConfig = {
                scale: 1.5 // Ajuste a escala conforme necessário
            };

            var pdfDoc = null;
            var currentPage = 1;
            var pdfViewerElement = document.getElementById('pdfViewer');
            var currentPageDisplay = document.getElementById('currentPageDisplay');

            // Função para renderizar uma página
            function renderPage(pageNum) {
                pdfDoc.getPage(pageNum).then(function(page) {
                    var viewport = page.getViewport({ scale: viewerConfig.scale });
                    var canvas = document.createElement('canvas');
                    canvas.id = 'page-' + pageNum;
                    var context = canvas.getContext('2d');
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;
                    pdfViewerElement.appendChild(canvas);
                    page.render({
                        canvasContext: context,
                        viewport: viewport
                    }).catch(function(error) {
                        console.error('Erro ao renderizar página: ', error);
                    });
                }).catch(function(error) {
                    console.error('Erro ao obter página: ', error);
                });
            }

            // Carregar o PDF usando PDF.js
            pdfjsLib.getDocument(pdfUrl).promise.then(function(pdfDoc_) {
                pdfDoc = pdfDoc_;
                for (var pageNum = 1; pageNum <= pdfDoc.numPages; pageNum++) {
                    renderPage(pageNum);
                }
            }).catch(function(error) {
                console.error('Erro ao carregar PDF: ', error);
            });

            // Adiciona evento ao botão de tela cheia
            document.getElementById('fullscreenButton').addEventListener('click', function() {
                var pdfViewerWrapper = document.getElementById('pdfViewerWrapper');
                if (pdfViewerWrapper.requestFullscreen) {
                    pdfViewerWrapper.requestFullscreen();
                } else if (pdfViewerWrapper.mozRequestFullScreen) { // Firefox
                    pdfViewerWrapper.mozRequestFullScreen();
                } else if (pdfViewerWrapper.webkitRequestFullscreen) { // Chrome, Safari, Opera
                    pdfViewerWrapper.webkitRequestFullscreen();
                } else if (pdfViewerWrapper.msRequestFullscreen) { // IE/Edge
                    pdfViewerWrapper.msRequestFullscreen();
                }
            });

            // Adiciona evento ao botão de busca de página
            document.getElementById('goToPageButton').addEventListener('click', function() {
                var pageNumber = parseInt(document.getElementById('pageNumber').value);
                if (pageNumber > 0 && pageNumber <= pdfDoc.numPages) {
                    var pageElement = document.getElementById('page-' + pageNumber);
                    if (pageElement) {
                        pageElement.scrollIntoView();
                    }
                } else {
                    alert('Número de página inválido');
                }
            });

            // Atualiza a exibição do número da página atual
            document.getElementById('pdfViewerWrapper').addEventListener('scroll', function() {
                var pages = document.querySelectorAll('#pdfViewer canvas');
                for (var i = 0; i < pages.length; i++) {
                    var rect = pages[i].getBoundingClientRect();
                    if (rect.top >= 0 && rect.bottom <= window.innerHeight) {
                        currentPage = i + 1;
                        currentPageDisplay.textContent = 'Página: ' + currentPage;
                        break;
                    }
                }
            });
        </script>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>

    <footer>
        <!-- Incluir o arquivo do rodapé usando PHP -->
        <?php include 'footer.php'; ?>
    </footer>
</body>

</html>
