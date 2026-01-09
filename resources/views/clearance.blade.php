@extends('layouts.portal')

@section('title', 'Clearance - Student Portal')

@section('content')
    <div class="page-header">
        <h2>Student Clearance</h2>
        <p>My Clearance | First Semester 2025-2026</p>
    </div>

    <!-- Registrar -->
    <div class="card">
        <div class="card-header">
            <h3>🏛️ Registrar</h3>
            <span class="card-icon">✅</span>
        </div>
        <table class="info-table" style="margin-top: 0;">
            <tr>
                <td>Personal Profile</td>
                <td style="text-align: right;"><span class="status-badge status-cleared">Cleared</span></td>
            </tr>
            <tr>
                <td>2x2 ID Picture</td>
                <td style="text-align: right;"><span class="status-badge status-cleared">Cleared</span></td>
            </tr>
            <tr>
                <td>Original PSA Birth Certificate</td>
                <td style="text-align: right;"><span class="status-badge status-cleared">Cleared</span></td>
            </tr>
            <tr>
                <td>Form 137-A / SF-10</td>
                <td style="text-align: right;"><span class="status-badge status-cleared">Cleared</span></td>
            </tr>
            <tr>
                <td>Original Transcript of Records (for Transferees)</td>
                <td style="text-align: right;"><span class="status-badge status-cleared">Cleared</span></td>
            </tr>
            <tr>
                <td>Original Honorable Dismissal (for Transferees)</td>
                <td style="text-align: right;"><span class="status-badge status-cleared">Cleared</span></td>
            </tr>
            <tr>
                <td>Original Granted Transcript of Records (Old)</td>
                <td style="text-align: right;"><span class="status-badge status-cleared">Cleared</span></td>
            </tr>
            <tr>
                <td>Original PSA Marriage Certificate (for Married)</td>
                <td style="text-align: right;"><span class="status-badge status-cleared">Cleared</span></td>
            </tr>
            <tr>
                <td>Copy of Passport (for Foreign Students)</td>
                <td style="text-align: right;"><span class="status-badge status-cleared">Cleared</span></td>
            </tr>
            <tr>
                <td>Apostille/Red Ribbon Credentials (from Abroad)</td>
                <td style="text-align: right;"><span class="status-badge status-cleared">Cleared</span></td>
            </tr>
            <tr>
                <td>Practicum/Internship Certificates (for Graduating)</td>
                <td style="text-align: right;"><span class="status-badge status-cleared">Cleared</span></td>
            </tr>
            <tr>
                <td>Report Card</td>
                <td style="text-align: right;"><span class="status-badge status-cleared">Cleared</span></td>
            </tr>
        </table>
    </div>

    <!-- Libraries -->
    <div class="card" style="margin-top: 20px;">
        <div class="card-header">
            <h3>📚 Libraries</h3>
            <span class="card-icon">✅</span>
        </div>
        <table class="info-table" style="margin-top: 0;">
            <tr>
                <td>Unreturned Books(s) - Library</td>
                <td style="text-align: right;"><span class="status-badge status-cleared">Cleared</span></td>
            </tr>
            <tr>
                <td>Fines - Library</td>
                <td style="text-align: right;"><span class="status-badge status-cleared">Cleared</span></td>
            </tr>
            <tr>
                <td>Others - Library</td>
                <td style="text-align: right;"><span class="status-badge status-cleared">Cleared</span></td>
            </tr>
            <tr>
                <td>RemoteXs Account/10 Articles - Library</td>
                <td style="text-align: right;"><span class="status-badge status-cleared">Cleared</span></td>
            </tr>
            <tr>
                <td>10 Printed Books - Library</td>
                <td style="text-align: right;"><span class="status-badge status-cleared">Cleared</span></td>
            </tr>
        </table>
    </div>

    <!-- Laboratories -->
    <div class="card" style="margin-top: 20px;">
        <div class="card-header">
            <h3>🔬 Laboratories</h3>
            <span class="card-icon">✅</span>
        </div>
        <table class="info-table" style="margin-top: 0;">
            <tr>
                <td colspan="2" style="text-align: center; padding: 8px;"><span class="status-badge status-cleared">Cleared</span></td>
            </tr>
        </table>
    </div>

    <!-- College Dean -->
    <div class="card" style="margin-top: 20px;">
        <div class="card-header">
            <h3>👨‍🎓 College Dean</h3>
            <span class="card-icon">✅</span>
        </div>
        <table class="info-table" style="margin-top: 0;">
            <tr>
                <td>Reports</td>
                <td style="text-align: right;"><span class="status-badge status-cleared">Cleared</span></td>
            </tr>
            <tr>
                <td>College Requirements</td>
                <td style="text-align: right;"><span class="status-badge status-cleared">Cleared</span></td>
            </tr>
            <tr>
                <td>Unreturned multimedia equipment & cables</td>
                <td style="text-align: right;"><span class="status-badge status-cleared">Cleared</span></td>
            </tr>
        </table>
    </div>

    <!-- Student Affairs / Discipline -->
    <div class="card" style="margin-top: 20px;">
        <div class="card-header">
            <h3>🎓 Student Affairs / Discipline</h3>
            <span class="card-icon">✅</span>
        </div>
        <table class="info-table" style="margin-top: 0;">
            <tr>
                <td>Handbook Orientation</td>
                <td style="text-align: right;"><span class="status-badge status-cleared">Cleared</span></td>
            </tr>
            <tr>
                <td>Reports</td>
                <td style="text-align: right;"><span class="status-badge status-cleared">Cleared</span></td>
            </tr>
            <tr>
                <td>Others</td>
                <td style="text-align: right;"><span class="status-badge status-cleared">Cleared</span></td>
            </tr>
            <tr>
                <td>Fun Run</td>
                <td style="text-align: right;"><span class="status-badge status-cleared">Cleared</span></td>
            </tr>
        </table>
    </div>

    <!-- Guidance -->
    <div class="card" style="margin-top: 20px;">
        <div class="card-header">
            <h3>💭 Guidance</h3>
            <span class="card-icon">✅</span>
        </div>
        <table class="info-table" style="margin-top: 0;">
            <tr>
                <td>Online Faculty Evaluation</td>
                <td style="text-align: right;"><span class="status-badge status-cleared">Cleared</span></td>
            </tr>
            <tr>
                <td>Personal Data Sheet (PDS)</td>
                <td style="text-align: right;"><span class="status-badge status-cleared">Cleared</span></td>
            </tr>
            <tr>
                <td>Psychological Test (LSI)</td>
                <td style="text-align: right;"><span class="status-badge status-cleared">Cleared</span></td>
            </tr>
            <tr>
                <td>Learning Session (1st Year Only)</td>
                <td style="text-align: right;"><span class="status-badge status-cleared">Cleared</span></td>
            </tr>
        </table>
    </div>

    <!-- Cashier -->
    <div class="card" style="margin-top: 20px;">
        <div class="card-header">
            <h3>💰 Cashier</h3>
            <span class="card-icon">✅</span>
        </div>
        <table class="info-table" style="margin-top: 0;">
            <tr>
                <td>Full Payment</td>
                <td style="text-align: right;"><span class="status-badge status-cleared">Cleared</span></td>
            </tr>
            <tr>
                <td>Liquidation Report</td>
                <td style="text-align: right;"><span class="status-badge status-cleared">Cleared</span></td>
            </tr>
            <tr>
                <td>Laboratory Breakages</td>
                <td style="text-align: right;"><span class="status-badge status-cleared">Cleared</span></td>
            </tr>
            <tr>
                <td>Other Payables</td>
                <td style="text-align: right;"><span class="status-badge status-cleared">Cleared</span></td>
            </tr>
        </table>
    </div>

    <!-- Overall Summary -->
    <div class="card-grid" style="margin-top: 20px;">
        <div class="card">
            <div class="card-header">
                <h3>📊 Clearance Status</h3>
            </div>
            <ul>
                <li><strong>Semester:</strong> First Semester 2025-2026</li>
                <li><strong>Overall Status:</strong> <span class="status-badge status-cleared">CLEARED</span></li>
                <li><strong>Departments:</strong> 7</li>
                <li><strong>Requirements:</strong> All Cleared</li>
            </ul>
        </div>
        <div class="card">
            <div class="card-header">
                <h3>📅 Academic Info</h3>
            </div>
            <ul>
                <li><strong>Student:</strong> Nico Mahipus</li>
                <li><strong>Student ID:</strong> 240000001368</li>
                <li><strong>Course:</strong> BSIT 2A</li>
                <li><strong>Status:</strong> Enrolled</li>
            </ul>
        </div>
    </div>
@endsection

