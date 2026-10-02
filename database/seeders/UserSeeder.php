use App\Models\User;
use Illuminate\Support\Facades\Hash;

public function run(): void
{
User::updateOrCreate(
['username' => 'admin'],
[
'name' => 'Administrator',
'email' => 'admin@sportswarehouse.com',
'password' => Hash::make('password'),
]
);
}