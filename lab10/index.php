<?php
    include 'header.html';
?>
<body>
    <main>
        <form action="result.php" method="POST">
            
            <label for="data">Текст:</label>
            <textarea id="data" name="data" rows="4"></textarea><br><br>

            <button class="btn" type="submit">Анализировать</button>
        </form>
    </main>

    <footer>
    </footer>
</body>
</html>