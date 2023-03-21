<?php

declare(strict_types=1);

/**
 * @copyright Copyright (c) 2019, Roeland Jago Douma <roeland@famdouma.nl>
 *
 * @author Julius Härtl <jus@bitgrid.net>
 * @author Roeland Jago Douma <roeland@famdouma.nl>
 * @author Hinrich Mahler <nextcloud@mahlerhome.de>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 *
 */
namespace OCA\StepUpAuth\Settings;

use OCA\StepUpAuth\AppInfo\Application;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\AppFramework\Services\IInitialState;
use OCP\IConfig;
use OCP\Util;
use OCP\Settings\ISettings;

class Personal implements ISettings {

	/** @var IConfig */
	private $config;
	/** @var string */
	private $userId;

	public function __construct(IConfig $config, string $userId) {
		$this->config = $config;
		$this->userId = $userId;
		$this->eduidUrl = "https://eduid.se";
	}

	public function getForm(): TemplateResponse {
	        $policy = new \OCP\AppFramework\Http\EmptyContentSecurityPolicy();
		$policy->allowInlineScript(true);

	        \OC::$server->getContentSecurityPolicyManager()->addDefaultPolicy($policy);


		$params = [ 'eduidUrl' => $this->eduidUrl ];
		return new TemplateResponse('stepupauth', 'personal', $params);
	}

	public function getSection(): string {
		return 'security';
	}

	public function getPriority(): int {
		return 90;
	}
}

