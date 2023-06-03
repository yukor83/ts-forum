<?php
declare(strict_types=1);


namespace Terricon\Forum\Tests\Infrastructure\Security;

use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase;
use Terricon\Forum\Application\SecurityDictionary;
use Terricon\Forum\Domain\Model\User;
use Terricon\Forum\Domain\Model\UserInterface;
use Terricon\Forum\Infrastructure\Security\Security;

class SecurityTest extends TestCase
{
    private readonly Generator $faker;
    private UserInterface $user;
    private Security $security;
    private array $permissionsConfig;
    private array $appointedPermissions = [];

    public function __construct(string $name)
    {
        $this->faker = Factory::create();
        $this->permissionsConfig = require_once __DIR__ . '/../../../config/permissions.php';
        parent::__construct($name);
    }
    public function setUp(): void
    {
        $this->appointedPermissions = [];
        $allowPermissions = SecurityDictionary::getAll();
        while (count($this->appointedPermissions) < 3) {
            $permissionNumber = rand(0, count($allowPermissions));
            $this->appointedPermissions[] = $allowPermissions[$permissionNumber];
        }
        $this->user = new User(
            email: $this->faker->email,
            nikName: $this->faker->userName,
            permissions:[SecurityDictionary::ROLE_ADMIN]
        );
        $this->security = new Security($this->permissionsConfig);
    }

    public function testIsGranted(): void
    {
        self::assertTrue($this->security->isGranted(SecurityDictionary::PERMISSION_CREATE_TOPIC, $this->user));
    }
}