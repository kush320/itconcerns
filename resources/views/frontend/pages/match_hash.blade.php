@extends('frontend.layouts.app')

@section('content')
<style>
    {
    font-family: 'Arial', sans-serif;
    background-color: #f9f9f9;
    margin: 0;
    padding: 0;
}

/* Hash Tool Container */
.hash-tool-container {
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Header */
.header h1 {
    text-align: center;
    color: #333;
    margin-bottom: 10px;
}

.header p {
    text-align: center;
    color: #666;
    font-size: 14px;
}

/* Hash Section */
.hash-section {
    margin: 20px 0;
}

.hash-section h2 {
    color: #08182e;
    font-size: 20px;
    margin-bottom: 10px;
}

/* Hash Form */
.hash-form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.form-group label {
    font-weight: bold;
    margin-bottom: 5px;
    color: #333;
}

.form-group input, .form-group select, .form-group textarea {
    width: 100%;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05);
}

textarea {
    resize: none;
    height: 100px;
}

.btn-primary {
    background-color: #f79d18;
    color: #fff;
    border: none;
    padding: 10px 15px;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s;
    text-align: center;
    display: inline-block;
    width: auto;
}

.btn-primary:hover {
    background-color: #08182e;
}

/* Result Box Styling */
.result-box {
    margin-top: 20px;
    padding: 15px;
    background: #f1f1f1;
    border: 1px solid #ddd;
    border-radius: 5px;
}

/* Match Result Styles */
.valid {
    color: green;
    font-weight: bold;
}

.not-valid {
    color: red;
    font-weight: bold;
}


.navigate-container {
    text-align: center;
    margin-top: 20px;
}

.navigate-container .btn-primary {
    background-color: #f79d18;
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.navigate-container .btn-primary:hover {
    background-color: #08182e;
}
</style>
<div class="hash-tool-container">
     <div class="header">
        <h1>Hash Generator and Matcher Tools</h1>
        <p>Effortlessly compare your original string with its hash to check if they match. Choose between MD5 or Bcrypt algorithms to validate your hash and ensure its accuracy.</p>
    </div>

    {{-- Match Hash Section --}}
    <section class="hash-section">
        <h2>Match Hash</h2>
        <form action="{{ route('match.hash.post') }}" method="POST" class="hash-form">
    @csrf
    <div class="form-group">
        <label for="original_string">Original String</label>
        <input type="text" id="original_string" name="original_string" value="{{ old('original_string') }}" placeholder="Enter the original text" required>
    </div>
    <div class="form-group">
        <label for="hashed_string">Hashed String</label>
        <textarea id="hashed_string" name="hashed_string" placeholder="Enter the hashed string" required>{{ old('hashed_string') }}</textarea>
    </div>
    <div class="form-group">
        <label for="hash_type">Hash Type</label>
        <select id="hash_type" name="hash_type" required>
          <option value="md5" {{ old('hash_type') == 'md5' ? 'selected' : '' }}>MD5</option>
            <option value="bcrypt" {{ old('hash_type') == 'bcrypt' ? 'selected' : '' }}>Bcrypt</option>
            
        </select>
    </div>
    <button type="submit" class="btn btn-secondary">Match</button>
</form>


        @if(session('is_match') !== null)
            <div class="result-box">
                <h3>Match Result</h3>
                <p><strong>Original String:</strong> {{ session('original_string') }}</p>
                <p><strong>Hashed String:</strong> {{ session('hashed_string') }}</p>
                <p><strong>Match Result:</strong> <span class="{{ session('is_match') ? 'valid' : 'not-valid' }}">{{ session('is_match') ? 'Valid' : 'Not Valid' }}</span></p>
            </div>
        @endif
    </section>

    {{-- Link to Generate Hash Page --}}
    <div class="navigate-container">
        <a href="{{ route('generate.hash') }}" class="btn-primary btn-sm">Go to Generate Hash Page</a>
    </div>
</div>
@endsection
