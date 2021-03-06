<?php

declare(strict_types=1);

namespace Gewaer\Api\Controllers;

use Canvas\Api\Controllers\BaseController as CanvasBaseController;
use Gewaer\Models\Teams;
use Canvas\Http\Request;
use Phalcon\Mvc\ModelInterface;

/**
 * Class BaseController.
 *
 * @package Gewaer\Api\Controllers
 *
 */
class TeamsController extends CanvasBaseController
{
    /*
       * fields we accept to create
       *
       * @var array
       */
    protected $createFields = ['regions_id', 'games_id', 'organizations_id', 'leagues_id', 'third_party_id', 'name', 'founded_date', 'is_active'];

    /*
     * fields we accept to create
     *
     * @var array
     */
    protected $updateFields = ['regions_id', 'games_id', 'organizations_id', 'leagues_id', 'third_party_id', 'name', 'founded_date', 'is_active'];

    /**
     * set objects.
     *
     * @return void
     */
    public function onConstruct()
    {
        $this->model = new Teams();

        $this->additionalSearchFields = [
            ['is_deleted', ':', '0']
        ];
    }

    /**
    * Process the create request and trecurd the boject.
    *
    * @return ModelInterface
    * @throws Exception
    */
    protected function processCreate(Request $request): ModelInterface
    {
        $team = parent::processCreate($request);
        $data = $request->getPostData();

        /**
         * @todo move this to filesystem , you know why we did this hack -_-
         */
        if (isset($data['logo'])) {
            $this->redis->set('team_logo_' . $team->getId(), $data['logo']);
        }

        return $team;
    }

    /**
    * Process the update request and return the object.
    *
    * @param Request $request
    * @param ModelInterface $record
    * @throws Exception
    * @return ModelInterface
    */
    protected function processEdit(Request $request, ModelInterface $record): ModelInterface
    {
        $team = parent::processEdit($request, $record);
        $data = $request->getPutData();

        /**
         * @todo move this to filesystem , you know why we did this hack -_-
         */
        if (isset($data['logo'])) {
            $this->redis->set('team_logo_' . $team->getId(), $data['logo']);
        }

        return $team;
    }
}
