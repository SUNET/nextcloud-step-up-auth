<?php

declare(strict_types=1);
// SPDX-FileCopyrightText: Mikael Nordin <kano@sunet.se>
// SPDX-License-Identifier: AGPL-3.0-or-later

namespace OCA\StepUpAuth\Controller;

use OC\Authentication\TwoFactorAuth\Manager;
use OCA\StepUpAuth\AppInfo\Application;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\IUserManager;
use OCP\IRequest;
use OCP\ISession;
use OCP\Util;

class PageController extends Controller
{
  private Manager $twoFactorManager;
  private ISession $session;
  private IUserManager $userManager;
  public function __construct(
    IRequest $request,
    ISession $session,
    Manager $twoFactorManager
  ) {
    parent::__construct(Application::APP_ID, $request);
    $this->session = $session;
    $this->twoFactorManager = $twoFactorManager;
    $this->userManager = $userManager;
  }

  /**
   * @NoAdminRequired
   * @NoCSRFRequired
   */
  public function index(): TemplateResponse
  {
    Util::addScript(Application::APP_ID, 'stepupauth-main');
    $uid = $this->session->get('globalScale.uid');
    $user = $this->userManager->get($uid);
    $this->twoFactorManager->prepareTwoFactorLogin($user, false);

    return new TemplateResponse(Application::APP_ID, 'main');
  }
}
