<?php
/**
 * Created by JetBrains PhpStorm.
 * User: catalin
 * Date: 10/17/13
 * Time: 4:33 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Homework\FirstBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Homework\FirstBundle\Entity\Flight;


/**
 * Class FirstController
 *
 * @package Homework\FirstBundle\Controller
 */
class FirstController extends Controller
{

    /**
     * Main Controller
     *
     * @return Response
     */
    public function indexAction()
    {

        $flights = array(
            array("nbr" => "625", "departDate" => "2013-10-23",),
            array("nbr" => "230", "departDate" => "2013-10-24",),
        );

        $fields = '{
        "flight": [
            {
                "rph": "departing",
                "carrierCode": "G4",
                "nbr": "' . $flights[1]['nbr'] . '",
                "departDate": "' . $flights[1]['departDate'] . '"
            }
                ],
        "callerInfo": {
            "name": "symfonyuser",
            "pwd": "",
            "appName": "SeatMapController",
            "moduleName": "SerbansMacbook",
            "sessionID": "7Z5Ao8e_ifoH6gCApirFskkBQ3n_B2_ZylIDkwqMl4M",
            "ipAddress": "::1"
            },
        "payloadAttributes": {
            "bookingTypeID": 1,
            "bookingChannelID": 1,
            "transactionIdentifier": "507287f2725e7",
            "version": 1,
            "timeStamp": "2012-10-08T12:46:40"
        }
        }';

        $url = 'http://svbrwbws1.sbx.allegiantair.com:8080/resweb/rest/flight/getSeatMaps';

        $response = $this->hitResWeb($url, $fields);

        return $this->handleResponse($response);
    }

    /**
     * This function calls ResWeb and returns the seatMap or error message.
     *
     * @param $url
     * @param $fields
     * @return mixed|string
     */
    public function hitResWeb($url, $fields)
    {
        $ct = 'application/json';

        $ch = curl_init();

        $headers = array('Content-Type: ' . $ct);

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 90);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($ch, CURLOPT_VERBOSE, false);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_POST, 1);

        if (!$result = curl_exec($ch)) {
            return (curl_error($ch) . "----" . curl_errno($ch));
        }

        return $result;
    }

    /**
     * Handles the response from ResWeb, prints to screen the response or
     * an error message
     *
     * @param $response
     * @return Response
     */
    public function handleResponse($response) {

        $responseArray = json_decode($response, true);

        if (isset ($responseArray)) {
            if (!empty($responseArray['flight'])) {

                $flight = new Flight();

                $flight->buildFromArray($responseArray['flight'][0]);

                return new Response($flight->toJson());
            } else {
                $errorMessage = $responseArray['error'][0]['description'];

                return new Response($errorMessage);
            }
        } else {
            return new Response("ResWeb call failed");
        }

    }

}