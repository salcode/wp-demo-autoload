<?php

namespace salcode\WpDemoAutoload\RestApiRoutes;

class Owner {
	public static function register_rest_route() {
		\register_rest_route(
			'salcode/v1',
			'/owner',
			[
				'callback' => [ Owner::class, 'read' ],
				'permission_callback' => '__return_true',
			]
		);
	}

	public static function read() {
		return [
			'name' => [
				'first' => 'Sal',
				'last' => 'Ferrarello'
			],
			'wcus' => [ 2015, 2016 ],
		];
	}
}
