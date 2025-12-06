
<?php
// Generate password hash for Admin@123
$password = 'Admin@123';
$hash = password_hash($password, PASSWORD_BCRYPT);
echo "Password: $password\n";
echo "Hash: $hash\n";
echo "\nVerification: " . (password_verify($password, $hash) ? 'SUCCESS' : 'FAILED') . "\n";
?>
