<!-- resources/views/verify-certificate.blade.php -->
<x-layouts.frontend>
    <div style="max-width: 400px; margin: 0 auto; background-color: #fff; padding: 20px; border: 1px solid #ddd; border-radius: 5px;">
        <h2 style="font-size: 20px; margin-bottom: 15px;">Verify Certificate</h2>

        @if (isset($success) && $success)
            <div style="background-color: #d4edda; padding: 15px; border-radius: 5px; margin-bottom: 15px;">
                <p style="color: red; margin: 0;"><strong>Certificate Verified!</strong></p>
                <p style="color: red; margin: 5px 0;">Student: {{ $certificate->student_name }}</p>
                <p style="color: red; margin: 5px 0;">Course: {{ $certificate->course->name }}</p>
                <p style="color: red; margin: 5px 0;">Course Date: {{ $certificate->course_date->format('Y-m-d') }}</p>
                <p style="color: red; margin: 5px 0;">Valid Until: {{ $certificate->validity_date->format('Y-m-d') }}</p>
            </div>
        @elseif (isset($error))
            <div style="background-color: #f8d7da; padding: 15px; border-radius: 5px; margin-bottom: 15px;">
                <p style="color: red; margin: 0;">{{ $error }}</p>
                @if ($certificate)
                    <p style="color: red; margin: 5px 0;">Validity Expired: {{ $certificate->validity_date->format('Y-m-d') }}</p>
                @endif
            </div>
        @endif

        <form action="{{ route('certificate.verify') }}" method="POST">
            @csrf
            <div style="margin-bottom: 15px;">
                <label for="code" style="display: block; font-size: 14px; margin-bottom: 5px;">Certificate Code</label>
                <input type="text" name="code" id="code" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 5px;" required>
            </div>
            <button type="submit" style="width: 100%; background-color: #007bff; color: #fff; padding: 10px; border: none; border-radius: 5px; cursor: pointer;">Verify</button>
        </form>
    </div>
</x-layouts.frontend>