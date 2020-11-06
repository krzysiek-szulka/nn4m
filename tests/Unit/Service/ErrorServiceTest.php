<?php

namespace Tests\Unit\Service;

use App\Models\Error;
use App\Repositories\ErrorRepository;
use App\Service\Error\ErrorService;
use Illuminate\Database\Eloquent\Collection;
use PHPUnit\Framework\TestCase;

class ErrorServiceTest extends TestCase
{
    public function testGetErrorsListReturnsCorrectArray()
    {
        $error1 = new Error();
        $error1->errors = [
            'phoneNumber' => [
                'The phone number field is required'
            ],
            'address.county' => [
                'The address.county field is required.'
            ],
        ];
        $error1->file_name = 'someFile';
        $error1->entry_number_in_file = 2;

        $repo = $this->createMock(ErrorRepository::class);
        $repo->expects($this->once())
            ->method('findByOperationId')
            ->with(12)
            ->willReturn(new Collection([$error1]));

        $service = new ErrorService($repo);
        $resultList = $service->getErrorsList(12);

        $this->assertEquals($resultList[0], 'Entry 2 in someFile: phoneNumber: The phone number field is required');
        $this->assertEquals($resultList[1], 'Entry 2 in someFile: address.county: The address.county field is required.');
    }
}
