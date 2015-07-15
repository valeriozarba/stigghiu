<?php   
    
//imposto il titolo della pagina 
$this->setSeoTitle("Sono il controller di Stigghiu!");
   
?>
<html>
        <head>
            <meta charset="UTF8" />
            <title><?=$this->getSeoTitle();//lo stampo?></title>
            
        </head>
        <body>
                <h1>Il controller principale</h1>
                <p>
                    Posso eseguire le operazioni sulla classe <?php echo __METHOD__;?>
                </p>
                <p>
                   Le oparazioni permesse... sono sul controller
                </p>
                <p>
                    Ciao MONDO!
                </p>

                <h2>Come funziona Stigghiu ?</h2>
                <p>
                    Stigghiu è un piccolo Framework MVC in Php per lo sviluppo di soluzioni web, per far funzionare stigghu bisogna avere a disposizione un web server. Su sistemi Linux o MacOSx si trova già
                    preconfigurato, ma ci può essere di aiuto anche in progetto <a href="" target="new">LAMP</a> 
                </p>
                
                <h2>Stigghiu boostrap</h2>
                <p>
                    Per avviare stiggiu puoi copiare il sorgente direttamente nella destinazione dove vuoi far avviare il sito. Una volta copiato editare il file <i>config/bootstrap.php</i>
                </p>
                <p>Questa è la gerarchia delle classi che rappresentano stigghiu</p>
                <ul>
                    <li>app/
                        <ul>
                            <li>app/controllers/</li>
                            <li>app/models/</li>
                            <li>app/templates/</li>
                        </ul>
                    </li>
                    <li>class/
                        <ul>
                            <li>class/libs/</li>
                            <li>class/Stigghiu.php</li>
                            <li>class/StigghiuController.php</li>
                            <li>class/StigghiuModel.php</li>
                            <li>class/loadlib.php</li>
                        </ul>
                    </li>
                    <li>config/
                        <ul>
                            <li>config/lang/</li>
                            <li>config/boostrap.php</li>
                        </ul>
                    </li>
                    
                    <li>public/</li>
                </ul>
                
                <?=" Puoi trovare il template su :<b>".__DIR__."</b>"?>
                
        </body>
</html>
<!--TEMPLATE CLASS -->


