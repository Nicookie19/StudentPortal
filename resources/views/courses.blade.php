@extends('layouts.portal')

@section('title', 'Curriculum View - Student Portal')

@section('content')
    <div class="page-header">
        <h2>My Curriculum</h2>
        <p>Student Information | BSIT_AY_2023_2024</p>
    </div>

    <!-- Student Information -->
    <div class="card-grid">
        <div class="card">
            <div class="card-header">
                <h3>👤 Student Information</h3>
            </div>
            <ul>
                <li><strong>Student Name:</strong> MAHIPUS, NICO</li>
                <li><strong>Student ID:</strong> 240000001368</li>
                <li><strong>Curriculum Code:</strong> BSIT_AY_2023_2024</li>
                <li><strong>Course:</strong> BSIT 2A</li>
            </ul>
        </div>
        <div class="card">
            <div class="card-header">
                <h3>📊 Academic Progress</h3>
            </div>
            <ul>
                <li><strong>Current Year:</strong> Second Year</li>
                <li><strong>Current Semester:</strong> Second Semester</li>
                <li><strong>Total Completed:</strong> 39 Courses</li>
                <li><strong>Remaining:</strong> 21 Courses</li>
            </ul>
        </div>
    </div>

    <!-- First Year -->
    <div class="card" style="margin-top: 20px;">
        <div class="card-header">
            <h3>📚 First Year</h3>
        </div>

        <!-- First Semester -->
        <div style="margin-top: 16px;">
            <h4 style="color: #FFFFFF; margin-bottom: 12px;">First Semester</h4>
            <table class="info-table" style="margin-top: 0;">
                <tr>
                    <th>Code</th>
                    <th>Course Description</th>
                    <th style="text-align: center;">Rating</th>
                </tr>
                <tr>
                    <td>IFP001.23</td>
                    <td>Ignacian Spirituality & Christian Life</td>
                    <td style="text-align: center;">94</td>
                </tr>
                <tr>
                    <td>GEC003.23</td>
                    <td>Science, Technology, and Society</td>
                    <td style="text-align: center;">91</td>
                </tr>
                <tr>
                    <td>GEC004.23</td>
                    <td>Art Appreciation</td>
                    <td style="text-align: center;">96</td>
                </tr>
                <tr>
                    <td>GEC007.23</td>
                    <td>Understanding the Self</td>
                    <td style="text-align: center;">94</td>
                </tr>
                <tr>
                    <td>CC001.23</td>
                    <td>Introduction to Computing</td>
                    <td style="text-align: center;">95</td>
                </tr>
                <tr>
                    <td>CC002.23</td>
                    <td>Computer Programming 1</td>
                    <td style="text-align: center;">81</td>
                </tr>
                <tr>
                    <td>IT001.23</td>
                    <td>Introduction to Human Computer Interaction</td>
                    <td style="text-align: center;">95</td>
                </tr>
                <tr>
                    <td>PE001.23</td>
                    <td>Physical Activities towards Health and Fitness 1 (PATH Fit1)</td>
                    <td style="text-align: center;">92</td>
                </tr>
                <tr>
                    <td>NSTP1.23</td>
                    <td>National Service Training Program 1</td>
                    <td style="text-align: center;">90</td>
                </tr>
                <tr style="background-color: rgba(255, 255, 0, 0.1);">
                    <td colspan="3" style="text-align: center; font-weight: 600;">Total Courses: 9</td>
                </tr>
            </table>
        </div>

        <!-- Second Semester -->
        <div style="margin-top: 24px;">
            <h4 style="color: var(--accent-color); margin-bottom: 12px;">Second Semester</h4>
            <table class="info-table" style="margin-top: 0;">
                <tr>
                    <th>Code</th>
                    <th>Course Description</th>
                    <th style="text-align: center;">Rating</th>
                </tr>
                <tr>
                    <td>RS001.23</td>
                    <td>Essentials of Catholic Faith and Life</td>
                    <td style="text-align: center;">94</td>
                </tr>
                <tr>
                    <td>GEC010.23</td>
                    <td>Living in the IT Era</td>
                    <td style="text-align: center;">89</td>
                </tr>
                <tr>
                    <td>GEC001.23</td>
                    <td>Purposive Communication</td>
                    <td style="text-align: center;">89</td>
                </tr>
                <tr>
                    <td>GEC002.23</td>
                    <td>Mathematics in the Modern World</td>
                    <td style="text-align: center;">89</td>
                </tr>
                <tr>
                    <td>CC003.23</td>
                    <td>Computer Programming 2</td>
                    <td style="text-align: center;">84</td>
                </tr>
                <tr>
                    <td>CC004.23</td>
                    <td>Visual Design & Motion Graphics *</td>
                    <td style="text-align: center;">94</td>
                </tr>
                <tr>
                    <td>CC005.23</td>
                    <td>Computer Systems Operation & Maintenance **</td>
                    <td style="text-align: center;">92</td>
                </tr>
                <tr>
                    <td>IT002.23</td>
                    <td>Quantitative Methods (Including Modeling & Simulation)</td>
                    <td style="text-align: center;">94</td>
                </tr>
                <tr>
                    <td>PE002.23</td>
                    <td>Physical Activities towards Health and Fitness 2 (PATH Fit2)</td>
                    <td style="text-align: center;">95</td>
                </tr>
                <tr>
                    <td>NSTP2.23</td>
                    <td>National Service Training Program 2</td>
                    <td style="text-align: center;">93</td>
                </tr>
                <tr style="background-color: rgba(255, 255, 0, 0.1);">
                    <td colspan="3" style="text-align: center; font-weight: 600;">Total Courses: 10</td>
                </tr>
            </table>
        </div>

        <!-- Summer -->
        <div style="margin-top: 24px;">
            <h4 style="color: var(--accent-color); margin-bottom: 12px;">Summer</h4>
            <table class="info-table" style="margin-top: 0;">
                <tr>
                    <th>Code</th>
                    <th>Course Description</th>
                    <th style="text-align: center;">Rating</th>
                </tr>
                <tr>
                    <td>CC006.23</td>
                    <td>Data Structure & Algorithms</td>
                    <td style="text-align: center;">87</td>
                </tr>
                <tr>
                    <td>CC007.23</td>
                    <td>Mathematics for Machine Learning 1</td>
                    <td style="text-align: center;">—</td>
                </tr>
                <tr style="background-color: rgba(255, 255, 0, 0.1);">
                    <td colspan="3" style="text-align: center; font-weight: 600;">Total Courses: 2</td>
                </tr>
            </table>
        </div>
    </div>

    <!-- Second Year -->
    <div class="card" style="margin-top: 20px;">
        <div class="card-header">
            <h3>📚 Second Year</h3>
        </div>

        <!-- First Semester -->
        <div style="margin-top: 16px;">
            <h4 style="color: var(--accent-color); margin-bottom: 12px;">First Semester</h4>
            <table class="info-table" style="margin-top: 0;">
                <tr>
                    <th>Code</th>
                    <th>Course Description</th>
                    <th style="text-align: center;">Rating</th>
                </tr>
                <tr>
                    <td>GEC008.23</td>
                    <td>The Contemporary World</td>
                    <td style="text-align: center;">89</td>
                </tr>
                <tr>
                    <td>CC008.23</td>
                    <td>Web Applications Development 1</td>
                    <td style="text-align: center;">92</td>
                </tr>
                <tr>
                    <td>CC009.23</td>
                    <td>Object-Oriented Programming</td>
                    <td style="text-align: center;">89</td>
                </tr>
                <tr>
                    <td>CC010.23</td>
                    <td>Systems Integration & Architecture</td>
                    <td style="text-align: center;">90</td>
                </tr>
                <tr>
                    <td>CC011.23</td>
                    <td>Information Management</td>
                    <td style="text-align: center;">87</td>
                </tr>
                <tr>
                    <td>CC012.23</td>
                    <td>Mathematics for Machine Learning 2</td>
                    <td style="text-align: center;">75</td>
                </tr>
                <tr>
                    <td>IT003.23</td>
                    <td>Networking 1</td>
                    <td style="text-align: center;">78</td>
                </tr>
                <tr>
                    <td>IT004.23</td>
                    <td>Discrete Mathematics</td>
                    <td style="text-align: center;">75</td>
                </tr>
                <tr>
                    <td>PE003.23</td>
                    <td>Physical Activities towards Health and Fitness 3 (PATH FIT3)</td>
                    <td style="text-align: center;">88</td>
                </tr>
                <tr style="background-color: rgba(255, 255, 0, 0.1);">
                    <td colspan="3" style="text-align: center; font-weight: 600;">Total Courses: 9</td>
                </tr>
            </table>
        </div>

        <!-- Second Semester (Current) -->
        <div style="margin-top: 24px;">
            <h4 style="color: var(--accent-color); margin-bottom: 12px;">Second Semester</h4>
            <table class="info-table" style="margin-top: 0;">
                <tr>
                    <th>Code</th>
                    <th>Course Description</th>
                    <th style="text-align: center;">Rating</th>
                </tr>
                <tr>
                    <td>LIT003/RS002.23</td>
                    <td>Religions, Religious Experiences & Spirituality</td>
                    <td style="text-align: center;">—</td>
                </tr>
                <tr>
                    <td>GEO003.23</td>
                    <td>Basic Grammar and Writing Composition (Nihonggo)</td>
                    <td style="text-align: center;">—</td>
                </tr>
                <tr>
                    <td>CC013.23</td>
                    <td>Web Applications Development 2</td>
                    <td style="text-align: center;">—</td>
                </tr>
                <tr>
                    <td>CC014.23</td>
                    <td>Advanced Database Systems</td>
                    <td style="text-align: center;">—</td>
                </tr>
                <tr>
                    <td>CC015.23</td>
                    <td>Project Management</td>
                    <td style="text-align: center;">—</td>
                </tr>
                <tr>
                    <td>CC016.23</td>
                    <td>Mathematics for Machine Learning 3</td>
                    <td style="text-align: center;">—</td>
                </tr>
                <tr>
                    <td>CC017.23</td>
                    <td>System Analysis and Design</td>
                    <td style="text-align: center;">—</td>
                </tr>
                <tr>
                    <td>IT005.23</td>
                    <td>Networking 2</td>
                    <td style="text-align: center;">—</td>
                </tr>
                <tr>
                    <td>PE004.23</td>
                    <td>Physical Activities towards Health and Fitness 4 (PATH Fit4)</td>
                    <td style="text-align: center;">—</td>
                </tr>
                <tr style="background-color: rgba(255, 255, 0, 0.1);">
                    <td colspan="3" style="text-align: center; font-weight: 600;">Total Courses: 9</td>
                </tr>
            </table>
        </div>

        <!-- Summer -->
        <div style="margin-top: 24px;">
            <h4 style="color: var(--accent-color); margin-bottom: 12px;">Summer</h4>
            <table class="info-table" style="margin-top: 0;">
                <tr>
                    <th>Code</th>
                    <th>Course Description</th>
                    <th style="text-align: center;">Rating</th>
                </tr>
                <tr>
                    <td>CC018.23</td>
                    <td>Technical writing</td>
                    <td style="text-align: center;">—</td>
                </tr>
                <tr>
                    <td>ELEC014.23</td>
                    <td>Seminars, Workshops, and Tours</td>
                    <td style="text-align: center;">—</td>
                </tr>
                <tr style="background-color: rgba(255, 255, 0, 0.1);">
                    <td colspan="3" style="text-align: center; font-weight: 600;">Total Courses: 2</td>
                </tr>
            </table>
        </div>
    </div>

    <!-- Third Year -->
    <div class="card" style="margin-top: 20px;">
        <div class="card-header">
            <h3>📚 Third Year</h3>
        </div>

        <!-- First Semester -->
        <div style="margin-top: 16px;">
            <h4 style="color: var(--accent-color); margin-bottom: 12px;">First Semester</h4>
            <table class="info-table" style="margin-top: 0;">
                <tr>
                    <th>Code</th>
                    <th>Course Description</th>
                    <th style="text-align: center;">Rating</th>
                </tr>
                <tr>
                    <td>ELEC026.23</td>
                    <td>Machine Learning</td>
                    <td style="text-align: center;">—</td>
                </tr>
                <tr>
                    <td>GEC006.23</td>
                    <td>Readings in Philippine History</td>
                    <td style="text-align: center;">—</td>
                </tr>
                <tr>
                    <td>CC019.23</td>
                    <td>Software Engineering</td>
                    <td style="text-align: center;">—</td>
                </tr>
                <tr>
                    <td>CC020.23</td>
                    <td>Mobile Applications Development</td>
                    <td style="text-align: center;">—</td>
                </tr>
                <tr>
                    <td>CC021.23</td>
                    <td>Data Analytics</td>
                    <td style="text-align: center;">—</td>
                </tr>
                <tr>
                    <td>IT006.23</td>
                    <td>Server Administration</td>
                    <td style="text-align: center;">—</td>
                </tr>
                <tr>
                    <td>ITELECT1.23</td>
                    <td>IT Elective 1</td>
                    <td style="text-align: center;">—</td>
                </tr>
                <tr>
                    <td>ITELECT2.23</td>
                    <td>IT Elective 2</td>
                    <td style="text-align: center;">—</td>
                </tr>
                <tr>
                    <td>ITELECT3.23</td>
                    <td>IT Elective 3</td>
                    <td style="text-align: center;">—</td>
                </tr>
                <tr style="background-color: rgba(255, 255, 0, 0.1);">
                    <td colspan="3" style="text-align: center; font-weight: 600;">Total Courses: 9</td>
                </tr>
            </table>
        </div>

        <!-- Second Semester -->
        <div style="margin-top: 24px;">
            <h4 style="color: var(--accent-color); margin-bottom: 12px;">Second Semester</h4>
            <table class="info-table" style="margin-top: 0;">
                <tr>
                    <th>Code</th>
                    <th>Course Description</th>
                    <th style="text-align: center;">Rating</th>
                </tr>
                <tr>
                    <td>IFP002.23</td>
                    <td>Ignacian Spirituality for Mission</td>
                    <td style="text-align: center;">—</td>
                </tr>
                <tr>
                    <td>GEC009.23</td>
                    <td>Life and Works of Rizal</td>
                    <td style="text-align: center;">—</td>
                </tr>
                <tr>
                    <td>CC022.23</td>
                    <td>Information Assurance & Security</td>
                    <td style="text-align: center;">—</td>
                </tr>
                <tr>
                    <td>CC023.23</td>
                    <td>Technopreneurship 1</td>
                    <td style="text-align: center;">—</td>
                </tr>
                <tr>
                    <td>IT007.23</td>
                    <td>Cloud Computing</td>
                    <td style="text-align: center;">—</td>
                </tr>
                <tr>
                    <td>IT008.23</td>
                    <td>IT Capstone Project 1</td>
                    <td style="text-align: center;">—</td>
                </tr>
                <tr>
                    <td>ITELECT4.23</td>
                    <td>IT Elective 4</td>
                    <td style="text-align: center;">—</td>
                </tr>
                <tr>
                    <td>ITFELECT1.23</td>
                    <td>IT Free Elective 1</td>
                    <td style="text-align: center;">—</td>
                </tr>
                <tr>
                    <td>ITFELECT2.23</td>
                    <td>IT Free Elective 2</td>
                    <td style="text-align: center;">—</td>
                </tr>
                <tr style="background-color: rgba(255, 255, 0, 0.1);">
                    <td colspan="3" style="text-align: center; font-weight: 600;">Total Courses: 9</td>
                </tr>
            </table>
        </div>
    </div>

    <!-- Fourth Year -->
    <div class="card" style="margin-top: 20px;">
        <div class="card-header">
            <h3>📚 Fourth Year</h3>
        </div>

        <!-- First Semester -->
        <div style="margin-top: 16px;">
            <h4 style="color: var(--accent-color); margin-bottom: 12px;">First Semester</h4>
            <table class="info-table" style="margin-top: 0;">
                <tr>
                    <th>Code</th>
                    <th>Course Description</th>
                    <th style="text-align: center;">Rating</th>
                </tr>
                <tr>
                    <td>GEC005.23</td>
                    <td>Ethics</td>
                    <td style="text-align: center;">—</td>
                </tr>
                <tr>
                    <td>CC024.23</td>
                    <td>Technopreneurship 2</td>
                    <td style="text-align: center;">—</td>
                </tr>
                <tr>
                    <td>IT009.23</td>
                    <td>IT Capstone Project 2</td>
                    <td style="text-align: center;">—</td>
                </tr>
                <tr>
                    <td>IT010.23</td>
                    <td>Integrative Technologies</td>
                    <td style="text-align: center;">—</td>
                </tr>
                <tr>
                    <td>ITELECT5.23</td>
                    <td>IT Elective 5</td>
                    <td style="text-align: center;">—</td>
                </tr>
                <tr>
                    <td>ITFELECT3.23</td>
                    <td>IT Free Elective 3</td>
                    <td style="text-align: center;">—</td>
                </tr>
                <tr style="background-color: rgba(255, 255, 0, 0.1);">
                    <td colspan="3" style="text-align: center; font-weight: 600;">Total Courses: 6</td>
                </tr>
            </table>
        </div>

        <!-- Second Semester -->
        <div style="margin-top: 24px;">
            <h4 style="color: var(--accent-color); margin-bottom: 12px;">Second Semester</h4>
            <table class="info-table" style="margin-top: 0;">
                <tr>
                    <th>Code</th>
                    <th>Course Description</th>
                    <th style="text-align: center;">Rating</th>
                </tr>
                <tr>
                    <td>IT011.23</td>
                    <td>Practicum (486 hrs.)</td>
                    <td style="text-align: center;">—</td>
                </tr>
                <tr style="background-color: rgba(255, 255, 0, 0.1);">
                    <td colspan="3" style="text-align: center; font-weight: 600;">Total Courses: 1</td>
                </tr>
            </table>
        </div>
    </div>

    <!-- Overall Summary -->
    <div class="card-grid" style="margin-top: 20px;">
        <div class="card">
            <div class="card-header">
                <h3>📊 Curriculum Summary</h3>
            </div>
            <ul>
                <li><strong>Total Curriculum Courses:</strong> 60</li>
                <li><strong>Completed:</strong> 39 courses</li>
                <li><strong>Remaining:</strong> 21 courses</li>
                <li><strong>Curriculum Code:</strong> BSIT_AY_2023_2024</li>
            </ul>
        </div>
        <div class="card">
            <div class="card-header">
                <h3>🎓 Academic Standing</h3>
            </div>
            <ul>
                <li><strong>Year Level:</strong> Second Year</li>
                <li><strong>Status:</strong> Enrolled</li>
                <li><strong>Section:</strong> BSIT 2A</li>
                <li><strong>GPA:</strong> 3.85 (current)</li>
            </ul>
        </div>
    </div>
@endsection

