@extends('layouts.base')
@section('title', 'مدیریت فایل‌ها')
<style> table{margin: 0 auto;width: 100% !important;clear: both;border-collapse: collapse;table-layout: fixed;word-wrap:break-word;} .dt-layout-start{margin-right: 0 !important;} .dt-layout-end{margin-left: 0 !important;}</style>
@section('content')
    <style>
        img { max-width: 150px; margin: 10px; cursor: pointer; }
    </style>
    <h4>فایل‌های این رکورد:</h4>
    <div>
        @foreach ($files as $file)
            <img src="{{ asset('storage/' . $file->file_path) }}" alt="{{ $file->file_name }}" onclick="selectFile('{{ asset('storage/' . $file->file_path) }}')">
        @endforeach
    </div>

@endsection
@section('script')
    <script>
        function selectFile(url) {
            if (window.opener && typeof window.opener.setFileUrl === 'function') {
                window.opener.setFileUrl(url);
                window.close();
            } else {
                alert("ارتباط با پنجره اصلی برقرار نشد.");
            }
        }
    </script>
@endsection
