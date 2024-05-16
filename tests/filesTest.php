<?php
############### autoload ###############
require_once "../vendor/autoload.php";

use Tester\Assert;


class FileTest extends Tester\TestCase
/**
 * TEST: Basic database query test.
 * 
 * @phpVersion 8.0
 */
/**
 *@dataProvider getData
 */
{
    public $File;
    public function setUp()
    {
        $this->File = new File;
    }

    public function tearDown()
    {
        # Úklid
    }

    public function getFiles()
    {
        return [
            [
                0, "nejezte kapsle do myčky",
                [
                    "files/moreFiles/rand1.rand",
                    "files/moreFiles/rand2.rand",
                    "files/moreFiles/rand3.rand",
                    "files/moreFiles/rand4.rand",
                    "files/moreFiles/rand5.rand",
                    "files/moreFiles/rand6.rand"
                ], "rand", "rand"
            ],
            [
                1, "hello kello to",
                [
                    "files/moreFiles/prefixhellothere.file",
                    "files/moreFiles/prefixilergkjhldvkjblůwoůdf65456456.file",
                    "files/moreFiles/prefixslkdfjůasdkfljaůslfjadůsf.file"
                ], "prefix", "file"
            ],
            [
                2, "hexagon is the bestagon",
                ["files/moreFiles/pifexfilename.test"], "pifex", "test"
            ],
            [
                3, "I'm Jeremy Donaldson. Have a peaceful night.",
                ["files/moreFiles/idk.todo"], "idk", "todo"
            ],
            [
                4, "Have you seen my idiot children?",
                ["files/moreFiles/fileWithContent.content"], "file", "content"
            ],
        ];
    }
    /**
     *@dataProvider getFiles
     */
    function testGetFilesByPrefix($id, $content, $fileList, $prefix, $suffix)
    {
        var_dump($this->File->getFilesByPrefix("files/moreFiles/", $prefix, $suffix));
        // tests for correct file content
        Assert::matchFile($this->File->getFilesByPrefix("files/", "test file", "file")[$id], $content);

        //tests for file searching algorithm
        Assert::equal($fileList, $this->File->getFilesByPrefix("files/moreFiles/", $prefix, $suffix));
    }
}

(new FileTest)->run();
