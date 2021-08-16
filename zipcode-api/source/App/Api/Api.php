<?php


namespace Source\App\Api;


use Source\Core\Controller;
use Source\Model\ZipCode;

/**
 * Class Api
 * @package Source\App\Api
 */
class Api extends Controller
{

    /**
     * @var ZipCode
     */
    protected ZipCode $zipcode;


    /**
     * Api constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->zipcode = new ZipCode();
    }

    /**
     * @param array $data
     * @return $this
     */
    public function index(array $data): Api
    {

        $this->zipcode->findAll();

        $zipcode = filter_var( $data['zipcode'], FILTER_SANITIZE_STRIPPED);

        return $this->json($this->valid_zipcode($zipcode));

    }

    /**
     * @param array|null $data
     */
    public function zipcode(?array $data): void
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        $zipcode = $this->valid_zipcode($data['zipcode']);

        if ($zipcode === false){
            $json["message"] = $this->message->error('CEP inválido!')->getText();
            echo json_encode($json);
            return;
        }

        $this->zipcode->zipcode = $data['zipcode'];
        $this->zipcode->cidade = $data['cidade'];

        if (!$this->zipcode->save()) {
            $json["message"] = $this->zipcode->message()->render();
            echo json_encode($json);
            return;
        }
    }

    /**
     * @param $zipcode
     * @return bool
     */
    public function valid_zipcode($zipcode): bool
    {
        $zipcode = preg_replace("/[^\d]/", "", $zipcode);

        if (is_numeric($zipcode)) {
            if (strlen($zipcode) === 6) {

                preg_match_all('/(\d)(?=\d\1)/', $zipcode, $matches, PREG_SET_ORDER, 0);

                if (empty($matches)) {
                   return true;
                } else {
                   return false;
                }
            }
        }
        return false;
    }

}