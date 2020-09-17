<!doctype html>

    <head>
        <title>PHP Functions</title>
        <meta charset="utf-8">

        <style>

            .problem {
                font-weight: bold;
            }

        </style>
    </head>

    <body>

        <h1>WDV341 Intro PHP</h1>

        <h2>PHP Functions</h2>

        <p class="problem">Create a function that will accept a date input and format it into mm/dd/yyyy format.</p>

        <?php

            function displayFullDate($inDate) {
            echo date ("m/d/Y", strtotime($inDate) );
        }

        echo "<p>".displayFullDate("dec 25 2020")."</p>";
        echo "<p>".displayFullDate("july 3rd 95")."</p>";

        ?>

        <p class="problem">Create a function that will accept a date input and format it into
            dd/mm/yyyy format to use when working with international dates.
        </p>

        <?php

            function displayIntlDate($inIntlDate) {
            echo date ("d/m/Y", strtotime($inIntlDate) );
        }

        echo "<p>".displayIntlDate("dec 25 2020")."</p>";
        echo "<p>".displayIntlDate("jul 3 1995")."</p>";

        ?>

        <p class="problem">
        Create a function that will accept a string input.  It will do the following
         things to the string:

         <ul>
            <li>Display the number of characters in the string</li>
            <li>Trim any leading or trailing whitespace</li>
            <li>Display the string as all lowercase characters</li>
            <li>Will display whether or not the string contains "DMACC" either upper or lowercase</li>
         </ul>

        </p>

        <?php

            function displayTrimLowerDMACC($inString) {
                echo $inString;
                echo "<p>Character count: " . strlen($inString) . "</p>";
                echo "<p>Trimmed string: " . trim($inString) . "</p>";
                echo "<p>String lowercase: " . strtolower($inString) . "</p>";

                if (stripos($inString, 'DMACC') !== false) {
                    echo "This string contains 'DMACC'";
                } else {
                    echo "This string does not contain 'DMACC'";
                }
            }
            
            displayTrimLowerDMACC("  I really hope my dmacc php works. IT DOES! I LOVE PHP     ");


        ?>

        <p class="problem">
        Create a function that will accept a number and display it as a formatted number.
        </p>

        <?php

            function formatNumber($inNum) {
                echo "The formatted number is: " . number_format($inNum);
            }

            formatNumber(1234567890);
        ?>

        <p class="problem">
        Create a function that will accept a number and display it as US currency.
        </p>

        <?php

            function convertToUSCurrency($inNum) {
                $formattedNum = number_format($inNum, 2, '.', ',');
                $formattedNum = "$" . $formattedNum;
                return $formattedNum;                
            }

            echo "The number in US currency is: " . convertToUSCurrency(123456.78);

        ?>


    </body>




</html>