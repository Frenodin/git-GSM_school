<?php
use PHPUnit\Framework\TestCase;
use phpmock\phpunit\PHPMock;

class SendPhpTest extends TestCase
{
    use PHPMock;

    public function testSendPhpRunsAndCallsMail()
    {
        $called = false;
        $mailMock = $this->getFunctionMock('', 'mail');
        $mailMock->expects($this->once())
            ->willReturnCallback(function() use (&$called) {
                $called = true;
                return true;
            });

        $_POST['name_user'] = 'John Doe';
        $_POST['message'] = 'Hello world';

        $result = include __DIR__ . '/../processing/send.php';

        $this->assertEquals(1, $result);
        $this->assertTrue($called, 'mail() should be called and return true');
    }
}
