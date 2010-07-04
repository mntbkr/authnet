# Authorize.net AIM Plugin for CakePHP 1.3.x
### Original Author: Jon Adams (http://github.com/pointlessjon)

## Description

This plugin provides an API to the Authorize.net AIM connection method. It can be used to accept payments by credit card or e-check.


## Installation

Download the plugin and place it in app/plugins/authnet. 

Setup the Authnet datasource by defining it in your database configuration.

	class DATABASE_CONFIG {
		var $authnet = array(
			'datasource' => 'Authnet.AuthnetSource',
			'server' => 'test',	// 'test' or 'live'
			'test_request' => false,
			'login' => 'API_LOGIN_ID',
			'key' => 'API_TRANSACTION_KEY'		
			);
		}


## Example Usage

You can access some of the plugin's built-in functional examples at app/authnet/authnet_transactions/add or update or delete.


## More Information

Read more about AIM Implementation from Authorize.net http://developer.authorize.net/api/aim/ 




booya!