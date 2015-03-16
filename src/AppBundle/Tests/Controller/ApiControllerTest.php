
// <?php
// // src/AppBundle/Tests/Controller/ApiControllerTest.php
 
// namespace AppBundle\Tests\Controller;
 
// use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
 
// class ApiControllerTest extends WebTestCase
// {
//     private function post($uri, array $data)
//     {
//         $content = json_encode($data);
//         $client = static::createClient();
//         $client->request('POST', $uri, array(), array(), array(), $content);
 
//         return $client->getResponse();
//     }
 
//     public function testInformacionSobreEmpresaExistente()
//     {
//         $response = $this->post('/api/informacion', array('empresa' => 'ACME'));
 
//         $this->assertTrue($response->isSuccessful());
//     }
 
//     public function testInformacionSobreEmpresaInexistente()
//     {
//         $response = $this->post('/api/informacion', array('empresa' => 'NO_EXISTE'));
 
//         $this->assertFalse($response->isSuccessful());
//     }
// }