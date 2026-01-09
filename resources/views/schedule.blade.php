@extends('layouts.portal')

@section('title', 'Class Schedule - Student Portal')

@section('content')
    <div class="page-header">
        <h2>Class Schedule</h2>
        <p>First Semester, AY 2024-2025 | BSIT 2A</p>
    </div>

    <div class="card">
        <div class="card-header">
            <h3>📅 Class Schedule</h3>
            <span class="card-icon">📆</span>
        </div>
        <table class="info-table" style="margin-top: 0;">
            <tr>
                <th>Course Code</th>
                <th>Subject Name</th>
                <th>Units</th>
                <th>Type</th>
                <th>Schedule</th>
                <th>Room</th>
                <th>Instructor</th>
            </tr>
            <tr>
                <td>CC017.23</td>
                <td>System Analysis and Design</td>
                <td>2.0</td>
                <td>Lec</td>
                <td>(1:00PM-3:00PM [M])</td>
                <td>ONLINE</td>
                <td>Manero</td>
            </tr>
            <tr>
                <td>LIT003/RS002.23</td>
                <td>Religions, Religious Experiences & Spirituality</td>
                <td>3.0</td>
                <td>Lec</td>
                <td>(9:30AM-10:30AM [M])/(9:30AM-10:30AM [W])/(9:30AM-10:30AM [F])</td>
                <td>303</td>
                <td>Bangcong</td>
            </tr>
            <tr>
                <td>CC014.23</td>
                <td>Advanced Database Systems</td>
                <td>2.0</td>
                <td>Lec</td>
                <td>(4:30PM-7:00PM [Th])</td>
                <td>L204</td>
                <td>Castro</td>
            </tr>
            <tr>
                <td>IT005.23</td>
                <td>Networking 2</td>
                <td>1.0</td>
                <td>Lab</td>
                <td>(1:00PM-4:00PM [T])</td>
                <td>L204</td>
                <td>Cloribel</td>
            </tr>
            <tr>
                <td>CC014.23</td>
                <td>Advanced Database Systems</td>
                <td>1.0</td>
                <td>Lab</td>
                <td>(4:30PM-7:30PM [Th])</td>
                <td>L204</td>
                <td>Castro</td>
            </tr>
            <tr>
                <td>GEO003.23</td>
                <td>Basic Grammar and Writing Composition (Nihonggo)</td>
                <td>3.0</td>
                <td>Lec</td>
                <td>(10:30AM-11:30AM [M])/(10:30AM-11:30AM [W])/(10:30AM-11:30AM [F])</td>
                <td>307</td>
                <td>Matol</td>
            </tr>
            <tr>
                <td>CC013.23</td>
                <td>Web Applications Development 2</td>
                <td>2.0</td>
                <td>Lec</td>
                <td>(4:30PM-7:30PM [T])</td>
                <td>L203</td>
                <td>Castro</td>
            </tr>
            <tr>
                <td>IT005.23</td>
                <td>Networking 2</td>
                <td>2.0</td>
                <td>Lec</td>
                <td>(1:00PM-4:00PM [T])</td>
                <td>L204</td>
                <td>Cloribel</td>
            </tr>
            <tr>
                <td>CC013.23</td>
                <td>Web Applications Development 2</td>
                <td>1.0</td>
                <td>Lab</td>
                <td>(4:30PM-7:30PM [T])</td>
                <td>L203</td>
                <td>Castro</td>
            </tr>
            <tr>
                <td>PE004.23</td>
                <td>Physical Activities towards Health and Fitness 4 (PATH Fit4)</td>
                <td>2.0</td>
                <td>Lec</td>
                <td>(10:00AM-12:00PM [T])</td>
                <td>FIELD</td>
                <td>Jose</td>
            </tr>
            <tr>
                <td>CC015.23</td>
                <td>Project Management</td>
                <td>3.0</td>
                <td>Lec</td>
                <td>(9:00AM-12:00PM [Th])</td>
                <td>L205</td>
                <td>Cloribel</td>
            </tr>
            <tr>
                <td>CC016.23</td>
                <td>Mathematics for Machine Learning 3</td>
                <td>3.0</td>
                <td>Lec</td>
                <td>(1:00PM-4:00PM [F])</td>
                <td>307</td>
                <td>Beltran</td>
            </tr>
            <tr>
                <td>CC017.23</td>
                <td>System Analysis and Design</td>
                <td>1.0</td>
                <td>Lab</td>
                <td>(1:00PM-4:00PM [Th])</td>
                <td>L201</td>
                <td>Manero</td>
            </tr>
        </table>
    </div>

    <div class="card-grid" style="margin-top: 20px;">
        <div class="card">
            <div class="card-header">
                <h3>📊 Schedule Summary</h3>
            </div>
            <ul>
                <li><strong>Total Classes:</strong> 13</li>
                <li><strong>Total Units:</strong> 26.0</li>
                <li><strong>Section:</strong> BSIT 2A</li>
            </ul>
        </div>
        <div class="card">
            <div class="card-header">
                <h3>📅 Academic Info</h3>
            </div>
            <ul>
                <li><strong>Semester:</strong> First Semester</li>
                <li><strong>AY:</strong> 2024-2025</li>
                <li><strong>Status:</strong> Enrolled</li>
            </ul>
        </div>
    </div>
@endsection

