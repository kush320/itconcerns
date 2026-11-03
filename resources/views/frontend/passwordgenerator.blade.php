@extends('frontend.layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <h1 class="text-center mb-4" style="color:#08182e;">Password Generator</h1>
            
      
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

        
            @if ($attempts >= $maxAttempts)
                <div class="alert alert-danger text-center">
                    You have reached the maximum password generation attempts ({{ $maxAttempts }} times).
                </div>
            @endif

         
            <form action="{{ route('password.generate') }}" method="POST" class="p-4 border rounded bg-light shadow-sm">
                @csrf
                <div class="mb-3">
                    <label for="length" class="form-label" style="color:#08182e;">Password Length:</label>
                    <input type="number" name="length" id="length" class="form-control @error('length') is-invalid @enderror" value="12" min="8" max="64" required>
                    @error('length')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="text-center">
 
                    @if ($attempts < $maxAttempts)
                        <button type="submit" class="btn btn-secondary btn-lg w-100">Generate Password</button>
                    @else
                        <button type="button" class="btn btn-secondary btn-lg w-100" disabled>Generate Password</button>
                    @endif
                </div>
            </form>


            @if (isset($password) && !empty($password))
            <div class="col-md-12">
                <div class="mt-5">
                    <h5 class="text-center" style="color:#08182e;">Generated Password</h5>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="generated-password">{{ $password }}</span>
                        <button class="btn btn-secondary btn-sm" onclick="copyToClipboard('{{ $password }}')">Copy</button>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<script>

    function copyToClipboard(password) {
        navigator.clipboard.writeText(password).then(function() {
            alert('Password copied to clipboard!');
        }, function(err) {
            console.error('Could not copy password: ', err);
        });
    }
</script>
@endsection
