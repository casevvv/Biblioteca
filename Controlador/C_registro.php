<?php
class controladores
{
    #Metodo para ingrear categorias
    private function c_categoriaL($catLibro, $pdo)
    {

        try {

            $stmt = $pdo->prepare("INSERT INTO categorias (nombre_categoria) VALUES (:nombre_categoria)");
            $stmt->bindParam(':nombre_categoria', $catLibro, PDO::PARAM_STR);
            $stmt->execute();
            echo "<script>alert('Datos registrados correctamente en la base de datos!')</script>";
        } catch (Exception $e) {

            echo "Error en la consulta de datos " . $e->getMessage();
        }
    }

    #Metodo para ingrear libros
    private function c_libro($titulo, $autor, $editorial, $ano_publi, $isbn, $cantidad, $pdo)
    {

        try {
            $libro =  $pdo->query("SELECT * FROM reg_libro");
            $categoriaL =  $pdo->query("SELECT idCatLibro FROM reg_catlibro");

            if ($categoriaL->num_rows > 0) {
                $stmt = $pdo->prepare("INSERT INTO reg_libro (titulo, autor, editorial, año_publicacion, isbn, cantidad,id_categoria) VALUES (:titulo, :autor, :editorial, :ano_publi, :isbn, :cantidad, :id_categoria)");
               
                // Bind parameters with data types
                $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
                $stmt->bindParam(':autor', $autor, PDO::PARAM_STR);
                $stmt->bindParam(':editorial', $editorial, PDO::PARAM_STR);
                $stmt->bindParam(':ano_publi', $ano_publi, PDO::PARAM_INT);
                $stmt->bindParam(':isbn', $isbn, PDO::PARAM_STR);
                $stmt->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
                $stmt->bindParam(':id_categoria', $categoriaL, PDO::PARAM_INT); // Assuming $categoriaL holds the actual category ID

                // Execute the prepared statement
                $stmt->execute();

                echo "Libro agregado exitosamente!<br>";
            } else {
                echo "No hay categorías disponibles. Agregue una categoría primero.<br>";
            }
        } catch (Exception $e) {

            echo "Error en la consulta de datos " . $e->getMessage();
        }
    }
}
