<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TareasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TareasTable Test Case
 */
class TareasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TareasTable
     */
    public $Tareas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Tareas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Tareas') ? [] : ['className' => TareasTable::class];
        $this->Tareas = TableRegistry::getTableLocator()->get('Tareas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tareas);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
