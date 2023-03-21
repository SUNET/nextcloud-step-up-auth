<?php
declare(strict_types=1);
// SPDX-FileCopyrightText: Mikael Nordin <kano@sunet.se>
// SPDX-License-Identifier: AGPL-3.0-or-later

namespace OCA\StepUpAuth\AppInfo;

use OCP\AppFramework\App;

class Application extends App {
	public const APP_ID = 'stepupauth';

	public function __construct() {
		parent::__construct(self::APP_ID);
	}
}
