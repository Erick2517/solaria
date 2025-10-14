<? 
require_once('conexion.php');

class CategoriaModel extends Conexion {
    private $conexion;
    private $table = 'categorias';
    public function __construct() {
        parent::__construct();
        $this->conexion = $this->getConexion();
    }

    public function verCategorias(){
        try{
            $sql = "SELECT * FROM {$this->table}";
            $cmd = $this->conexion->prepare($sql);
            $cmd->execute();
            return $cmd->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            echo "Error al obtener las categorias: " . $e->getMessage();
            return [];
        }
    }
}