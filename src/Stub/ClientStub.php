<?php
namespace Hidehalo\JsonRpc\Stub;

use Hidehalo\JsonRpc\Connection;
use Hidehalo\JsonRpc\Protocol\Request;
use Hidehalo\JsonRpc\Protocol\BatchRequest;

class ClientStub
{
    private $service;

    /**
     * @coverageIgnored
     * @param $service
     * @param Connection $connection
     */
    public function __construct($service, Connection $connection)
    {
        $this->service = $service;
        $this->conn = $connection;
    }

    public function procedure($payload)
    {
        $this->conn->write($payload);
        $res = $this->conn->read();
        
        return JSON::parseResponse($req);        
    }

    /**
     * start batch requests
     */
    public function batch()
    {
        $batch = new BatchRequest();

        return $batch;
    }

    public function __call($name, $arguments = [])
    {
        $req = new Request($name, $arguments, ['service' => $this->service]);

        return (string) $req;
    }
}