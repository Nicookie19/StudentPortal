@extends('layouts.portal')

@section('title', 'Academic Record - Student Portal')

@section('content')
    <div class="page-header">
        <h2>Academic Record</h2>
        <p>First Semester, AY 2024-2025 | BSIT 2A</p>
    </div>

    <div class="card">
        <div class="card-header">
            <h3>📊 Grade Summary</h3>
            <span class="card-icon">📈</span>
        </div>
        <table class="info-table" style="margin-top: 0;">
            <tr>
                <th>Course Code</th>
                <th>Subject Name</th>
                <th>Units</th>
                <th>Prelim</th>
                <th>Midterm</th>
                <th>Final</th>
                <th>Section</th>
            </tr>
            <tr>
                <td>LIT003/RS002.23</td>
                <td>Religions, Religious Experiences & Spirituality</td>
                <td>3.0</td>
                <td>40</td>
                <td>40</td>
                <td>40</td>
                <td>BSIT 2A</td>
            </tr>
            <tr>
                <td>GEO003.23</td>
                <td>Basic Grammar and Writing Composition (Nihonggo)</td>
                <td>3.0</td>
                <td>40</td>
                <td>40</td>
                <td>40</td>
                <td>BSIT 2A</td>
            </tr>
            <tr>
                <td>CC013.23</td>
                <td>Web Applications Development 2</td>
                <td>3.0</td>
                <td>40</td>
                <td>40</td>
                <td>40</td>
                <td>BSIT 2A</td>
            </tr>
            <tr>
                <td>CC014.23</td>
                <td>Advanced Database Systems</td>
                <td>3.0</td>
                <td>40</td>
                <td>40</td>
                <td>40</td>
                <td>BSIT 2A</td>
            </tr>
            <tr>
                <td>CC015.23</td>
                <td>Project Management</td>
                <td>3.0</td>
                <td>40</td>
                <td>40</td>
                <td>40</td>
                <td>BSIT 2A</td>
            </tr>
            <tr>
                <td>CC016.23</td>
                <td>Mathematics for Machine Learning 3</td>
                <td>3.0</td>
                <td>40</td>
                <td>40</td>
                <td>40</td>
                <td>BSIT 2A</td>
            </tr>
            <tr>
                <td>CC017.23</td>
                <td>System Analysis and Design</td>
                <td>3.0</td>
                <td>40</td>
                <td>40</td>
                <td>40</td>
                <td>BSIT 2A</td>
            </tr>
            <tr>
                <td>IT005.23</td>
                <td>Networking 2</td>
                <td>3.0</td>
                <td>40</td>
                <td>40</td>
                <td>40</td>
                <td>BSIT 2A</td>
            </tr>
            <tr>
                <td>PE004.23</td>
                <td>Physical Activities towards Health and Fitness 4 (PATH Fit4)</td>
                <td>2.0</td>
                <td>40</td>
                <td>40</td>
                <td>40</td>
                <td>BSIT 2A</td>
            </tr>
        </table>
    </div>

    <div class="card-grid" style="margin-top: 20px;">
        <div class="card">
            <div class="card-header">
                <h3>📈 Current Performance</h3>
                <span class="card-icon">🎯</span>
            </div>
            <ul>
                <li><strong>Current GPA:</strong> <span style="font-size: 2rem; color: #FFFFFF; font-weight: 700;">3.85</span></li>
                <li><strong>Total Units:</strong> 26.0</li>
                <li><strong>Standing:</strong> Good</li>
                <li><strong>Ranking:</strong> Top 15%</li>
            </ul>
        </div>

        <div class="card">
            <div class="card-header">
                <h3>📋 Academic Summary</h3>
                <span class="card-icon">📊</span>
            </div>
            <ul>
                <li><strong>Total Courses:</strong> 9</li>
                <li><strong>Total Units:</strong> 26.0</li>
                <li><strong>Section:</strong> BSIT 2A</li>
                <li><strong>Semester:</strong> First Semester 2024-2025</li>
            </ul>
        </div>
    </div>
@endsection

