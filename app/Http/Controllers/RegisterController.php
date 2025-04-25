<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);
        Cache::put('registered_email', $validatedData['email']);
    
        $user = User::create([
            'name' => 'Unknown',
            'username' => 'user_' . Str::random(6),
            'email' => $validatedData['email'],
            'email_verified_at' => null,
            'email_code' => rand(100000, 999999),
            'phone' => '0000000000',
            'country' => 'Unknown',
            'address' => 'Unknown',
            'password' => bcrypt($validatedData['password']),
            'userverify' => 0,
            'plan' => 'Null',
        ]);
    
        try {
            Mail::raw('Your verification code is: ' . $user->email_code, function ($message) use ($user) {
                $message->to($user->email)
                        ->subject('Verify Your Email');
            });
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'User created but mail sending failed: ' . $e->getMessage()
            ], 500);
        }
    
        return response()->json([
            'message' => 'Registration successful. Please check your email for the verification code.',
        ], 200);
    }
    

    public function verifycode(Request $request)
    {
        // Validate the input
        $request->validate([
            'email' => 'required|email',
            'code' => 'required|digits:6',
        ]);
    
        // Fetch the cached email
        $cachedEmail = $email = Cache::get('registered_email');
    
        if (!$cachedEmail) {
            return response()->json([
                'message' => 'Email not found in cache. Please register or verify again.'
            ], 400);
        }
    
        // Now find user by cached email
        $user = User::where('email', $cachedEmail)->first();
    
        if (!$user) {
            return response()->json([
                'message' => 'User not found with this email.'
            ], 404);
        }
    
        // Check code
        if ($request->code == $user->email_code) {
            // Update verification
            $user->email_verified_at = now();
            $user->userverify = 1;
            $user->email_code= 0;
            $user->save();
    
            // Optionally: remove the cache after successful verification
      
            Cache::put('email_verification_' . $user->email, $user->email, now()->addMinutes(20));
            return response()->json([
                'message' => 'Email verified successfully.'
            ], 200);
        }
    
        return response()->json([
            'message' => 'Invalid verification code.'
        ], 400);
    }
// Backend code (already correct)
public function updateprofile(Request $request)

{
    try {
        // Validate incoming request
        $request->validate([
            
            'name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:100',
            'plan' => 'nullable|string|max:50',
        ]);

        // Check if email verification cache exists
        $cachedEmails = Cache::get('email_verification_' . $request->email);
        Log::info('Updating profile for email: ' . $cachedEmails);


       

        // Now find the user
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            throw new \Exception('User not found.');
        }

        // Update user details
        $user->name = $request->name ?? $user->name;
        $user->phone = $request->phone ?? $user->phone;
        $user->address = $request->address ?? $user->address;
        $user->country = $request->country ?? $user->country;
        $user->plan = $request->plan ?? "Free"; // Static plan

        $user->save();

        // Return success response
        return response()->json([
            'message' => 'Profile updated successfully.',
            'user' => "looking for user ? nhi milega"
        ], 200);

    } catch (\Exception $e) {
        // Log the exception for debugging purposes
        Log::error('Error updating profile: ' . $e->getMessage());

        // Return the error response in JSON format
        return response()->json([
            'message' => 'An error occurred while updating the profile.',
            'error' => $e->getMessage()
        ], 400);  // Send a Bad Request status code for errors
    }
}



}    