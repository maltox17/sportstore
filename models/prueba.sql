SELECT p.*, c.nombre AS 'catnombre', FROM productos p 
INNER JOIN categorias c ON c.id = p.categoria_id WHERE p.categoria_id = 1 ORDER BY p.id DESC;

SELECT p.*, c.nombre AS 'catnombre' FROM productos p
INNER JOIN categorias c ON c.id = p.categoria_id WHERE p.categoria_id = 1
ORDER BY p.id DESC;

        $sql = "SELECT p.*, c.nombre AS 'catnombre', FROM productos p INNER JOIN categorias c ON c.id = p.categoria_id WHERE p.categoria_id = {$this->getCategoria_id()} ORDER BY p.id DESC";



/*
  You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 
  'FROM productos p INNER JOIN categorias c ON c.id = p.categoria_id WHERE p.categ' at line 1
*/