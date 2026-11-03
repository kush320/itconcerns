@extends('frontend.layouts.app')

@section('content')
<style>
    {
    font-family: 'Arial', sans-serif;
    background-color: #f9f9f9;
    margin: 0;
    padding: 0;
}

.hash-tool-container {
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

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

.hash-section {
    margin: 20px 0;
}

.hash-section h2 {
    color: #08182e;
    font-size: 20px;
    margin-bottom: 10px;
}

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
}

.btn-primary:hover {
    background-color: #08182e;
}

.result-box {
    margin-top: 20px;
    padding: 15px;
    background: #f1f1f1;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.result-box h3 {
    color: #444;
    margin-bottom: 10px;
}

.result-box p {
    margin: 5px 0;
    font-size: 14px;
}

.match {
    color: green;
    font-weight: bold;
}

.no-match {
    color: red;
    font-weight: bold;
}
</style>
<div class="hash-tool-container">
<div class="header">
        <h1>Hash Generator and Matcher Tools</h1>
        <p>Securely generate and validate hashes with ease. Choose between MD5 or Bcrypt algorithms.</p>
    </div>

    {{-- Generate Hash Section --}}
    <section class="hash-section">
        <h2>Generate Hash</h2>
        <form action="{{ route('generate.hash.post') }}" method="POST" class="hash-form">
            @csrf
            <div class="form-group">
                <label for="input_string">Input String</label>
                <input type="text" id="input_string" name="input_string" value="{{ old('input_string') }}" placeholder="Enter text to hash" required>
            </div>
            <div class="form-group">
                <label for="hash_type">Hash Type</label>
                <select id="hash_type" name="hash_type" required>
                    <option value="md5" {{ old('hash_type') == 'md5' ? 'selected' : '' }}>MD5</option>
                    <option value="bcrypt" {{ old('hash_type') == 'bcrypt' ? 'selected' : '' }}>Bcrypt</option>
                </select>
            </div>
            <button type="submit" class="btn btn-secondary ">Generate</button>
        </form>

        @if(session('generated_hash'))
            <div class="result-box">
                <h3>Generated Hash</h3>
                <p><strong>Input:</strong> {{ session('input_string') }}</p>
                <p><strong>Hash Type:</strong> {{ session('hash_type') }}</p>
                <p><strong>Hash:</strong> {{ session('generated_hash') }}</p>
            </div>
        @endif
    </section>

    {{-- Link to Match Hash Page --}}
    <section class="hash-section">
        <h2>Match Hash</h2>
        <a href="{{ route('match.hash') }}" class="btn btn-primary btn-sm">Go to Match Hash</a>
    </section>
</div>
@endsection

