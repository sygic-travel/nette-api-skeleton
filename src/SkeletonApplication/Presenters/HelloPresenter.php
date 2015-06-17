<?php

namespace Tripomatic\SkeletonApplication\Presenters;

use Nette\Application\Request;
use Tripomatic\NetteApi\Application\Presenter;
use Tripomatic\NetteApi\Application\Responses\JsonResponse;

class HelloPresenter extends Presenter
{
	public function get(Request $request)
	{
		return new JsonResponse(['message' => 'Hello!']);
	}
}
