<?php
/**
 * Making the file compatible with theme variables
 */
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require( $parse_uri[0] . 'wp-load.php' );
/** Theme variables compatibility complete**/

class MailChimp
{
    private $api_key;
    private $api_endpoint = 'https://<dc>.api.mailchimp.com/2.0';
    private $verify_ssl   = false;

    /**
     * Create a new instance
     * @param string $api_key Your MailChimp API key
     */
    public function __construct($api_key)
    {
        $this->api_key = $api_key;
		if ($api_key != ""){
        list(, $datacentre) = explode('-', $this->api_key);
        $this->api_endpoint = str_replace('<dc>', $datacentre, $this->api_endpoint);
		}
    }
	
	/**
     * Validates MailChimp API Key
     */
    public function validateApiKey()
    {
        $request = $this->call('helper/ping');
		return !empty($request);
    }
    /**
     * Call an API method. Every request needs the API key, so that is added automatically -- you don't need to pass it in.
     * @param  string $method The API method to call, e.g. 'lists/list'
     * @param  array  $args   An array of arguments to pass to the method. Will be json-encoded for you.
     * @return array          Associative array of json decoded API response.
     */
    public function call($method, $args = array(), $timeout = 10)
    {
        return $this->makeRequest($method, $args, $timeout);
    }

    /**
     * Performs the underlying HTTP request. Not very exciting
     * @param  string $method The API method to be called
     * @param  array  $args   Assoc array of parameters to be passed
     * @return array          Assoc array of decoded result
     */
    private function makeRequest($method, $args = array(), $timeout = 10)
    {
        $args['apikey'] = $this->api_key;
        $url = $this->api_endpoint.'/'.$method.'.json';
        $json_data = json_encode($args);
        if (function_exists('curl_init') && function_exists('curl_setopt')) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($ch, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $this->verify_ssl);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
            curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
            $result = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
        } else {
            $result    = wp_remote_get($url, null, stream_context_create(array(
                'http' => array(
                    'protocol_version' => 1.1,
                    'user_agent'       => 'PHP-MCAPI/2.0',
                    'method'           => 'POST',
                    'header'           => "Content-type: application/json\r\n".
                                          "Connection: close\r\n" .
                                          "Content-length: " . strlen($json_data) . "\r\n",
                    'content'          => $json_data,
                ),
            )));
        }
        return $result ? json_decode($result, true) : false;
    }
}
$email = trim($_POST["email1"]);
$MailChimp = new MailChimp(appeasy_get_option('mailchimp_apikey'));
$api = appeasy_get_option('mailchimp_apikey');
$double_optin = appeasy_get_option('mailchimp_optin');
$list_id = appeasy_get_option('mailchimp_listid');
		$args2 = array(
			'headers'     => array(
			  'Authorization' => 'Basic ' . base64_encode( 'user:' . $api ),
			  'Access-Control-Allow-Origin' => '*',
			),
		  );
        // MailChimp API URL
        $memberID = md5(strtolower($email));
        $dataCenter = substr($api,strpos($api,'-')+1);
        $url2 = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $list_id . '/members/' . $memberID;
		$response = wp_remote_get( $url2 , $args2 );
	    $body = json_decode( wp_remote_retrieve_body( $response ) );
		$mailchimp_status = $body->status;
    if($mailchimp_status == 'subscribed'){
		print json_encode(esc_html__('You are already subscribed. Thankyou.', 'appeasy'));
	} else {
				$mailchimp_result = $MailChimp->call('lists/subscribe', array(
													'id'                => appeasy_get_option('mailchimp_listid'),
													'email'             => array('email'=> $email),
													//'merge_vars'        => array('FNAME'=> $first_name),
													'double_optin'      => $double_optin,
													'update_existing'   => true,
													'send_welcome'      => true,
												));
		if (isset($mailchimp_result['leid'])) {
			print json_encode(esc_html__('Thank You for Subscribing!', 'apparatus'));   
		} else {
			print json_encode(esc_html__('Please, Input a Valid Email.', 'apparatus'));
		}
	}
?>