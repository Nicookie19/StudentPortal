<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Enrollment;
use App\Models\Schedule;
use App\Models\Student;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@test.com',
            'password' => Hash::make('password123'),
        ]);

        // Create departments
        $departments = [
            ['name' => 'Computer Science', 'code' => 'CS', 'description' => 'Department of Computer Science and Engineering'],
            ['name' => 'Information Technology', 'code' => 'IT', 'description' => 'Department of Information Technology'],
            ['name' => 'Software Engineering', 'code' => 'SE', 'description' => 'Department of Software Engineering'],
            ['name' => 'Data Science', 'code' => 'DS', 'description' => 'Department of Data Science'],
        ];

        foreach ($departments as $dept) {
            Department::create($dept);
        }

        // Create subjects
        $subjects = [
            ['subject_code' => 'CS101', 'subject_name' => 'Introduction to Computer Science', 'units' => 3, 'type' => 'lecture', 'department_id' => 1, 'semester' => 1, 'description' => 'Fundamentals of computer science and programming'],
            ['subject_code' => 'CS102', 'subject_name' => 'Data Structures and Algorithms', 'units' => 4, 'type' => 'both', 'department_id' => 1, 'semester' => 2, 'description' => 'Advanced data structures and algorithm analysis'],
            ['subject_code' => 'CS201', 'subject_name' => 'Object-Oriented Programming', 'units' => 3, 'type' => 'both', 'department_id' => 1, 'semester' => 3, 'description' => 'OOP concepts and design patterns'],
            ['subject_code' => 'CS202', 'subject_name' => 'Database Management Systems', 'units' => 4, 'type' => 'both', 'department_id' => 1, 'semester' => 3, 'description' => 'Relational databases and SQL'],
            ['subject_code' => 'CS301', 'subject_name' => 'Web Development', 'units' => 3, 'type' => 'both', 'department_id' => 1, 'semester' => 4, 'description' => 'Full-stack web development'],
            ['subject_code' => 'CS302', 'subject_name' => 'Software Engineering', 'units' => 3, 'type' => 'lecture', 'department_id' => 1, 'semester' => 4, 'description' => 'Software development lifecycle and methodologies'],
            ['subject_code' => 'IT101', 'subject_name' => 'Introduction to IT', 'units' => 3, 'type' => 'lecture', 'department_id' => 2, 'semester' => 1, 'description' => 'Foundations of Information Technology'],
            ['subject_code' => 'IT201', 'subject_name' => 'Network Fundamentals', 'units' => 3, 'type' => 'both', 'department_id' => 2, 'semester' => 2, 'description' => 'Computer networks and protocols'],
            ['subject_code' => 'SE101', 'subject_name' => 'Software Design and Architecture', 'units' => 3, 'type' => 'lecture', 'department_id' => 3, 'semester' => 3, 'description' => 'Software architecture patterns and design principles'],
            ['subject_code' => 'DS101', 'subject_name' => 'Introduction to Data Science', 'units' => 3, 'type' => 'both', 'department_id' => 4, 'semester' => 1, 'description' => 'Data science fundamentals and Python programming'],
        ];

        foreach ($subjects as $subject) {
            Subject::create($subject);
        }

        // Create 30 Filipino students with Filipino names and Philippine addresses
        $students = [
            ['student_id' => '2024-0001', 'first_name' => 'Juan', 'last_name' => 'Dela Cruz', 'email' => 'juan.delacruz@test.com', 'department_id' => 1, 'year_level' => '1st Year', 'status' => 'active', 'phone' => '+63 912 345 6701', 'address' => '123 Taft Avenue, Manila'],
            ['student_id' => '2024-0002', 'first_name' => 'Maria', 'last_name' => 'Santos', 'email' => 'maria.santos@test.com', 'department_id' => 1, 'year_level' => '2nd Year', 'status' => 'active', 'phone' => '+63 912 345 6702', 'address' => '456 Quezon Avenue, Quezon City'],
            ['student_id' => '2024-0003', 'first_name' => 'Jose', 'last_name' => 'Garcia', 'email' => 'jose.garcia@test.com', 'department_id' => 2, 'year_level' => '1st Year', 'status' => 'active', 'phone' => '+63 912 345 6703', 'address' => '789 Colon Street, Cebu City'],
            ['student_id' => '2024-0004', 'first_name' => 'Ana', 'last_name' => 'Reyes', 'email' => 'ana.reyes@test.com', 'department_id' => 1, 'year_level' => '3rd Year', 'status' => 'active', 'phone' => '+63 912 345 6704', 'address' => '321 Roxas Boulevard, Manila'],
            ['student_id' => '2024-0005', 'first_name' => 'Michael', 'last_name' => 'Cruz', 'email' => 'michael.cruz@test.com', 'department_id' => 3, 'year_level' => '2nd Year', 'status' => 'active', 'phone' => '+63 912 345 6705', 'address' => '654 Magellans Cross, Davao City'],
            ['student_id' => '2024-0006', 'first_name' => 'Jessica', 'last_name' => 'Aquino', 'email' => 'jessica.aquino@test.com', 'department_id' => 4, 'year_level' => '1st Year', 'status' => 'active', 'phone' => '+63 912 345 6706', 'address' => '987 Lacson Street, Manila'],
            ['student_id' => '2024-0007', 'first_name' => 'Mark', 'last_name' => 'Mendoza', 'email' => 'mark.mendoza@test.com', 'department_id' => 1, 'year_level' => '4th Year', 'status' => 'active', 'phone' => '+63 912 345 6707', 'address' => '147 Osmeña Boulevard, Cebu City'],
            ['student_id' => '2024-0008', 'first_name' => 'Emily', 'last_name' => 'Lopez', 'email' => 'emily.lopez@test.com', 'department_id' => 2, 'year_level' => '2nd Year', 'status' => 'active', 'phone' => '+63 912 345 6708', 'address' => '258 EDSA, Quezon City'],
            ['student_id' => '2024-0009', 'first_name' => 'Daniel', 'last_name' => 'Bautista', 'email' => 'daniel.bautista@test.com', 'department_id' => 3, 'year_level' => '1st Year', 'status' => 'active', 'phone' => '+63 912 345 6709', 'address' => '369 Rizal Avenue, Angeles City'],
            ['student_id' => '2024-0010', 'first_name' => 'Sarah', 'last_name' => 'Torres', 'email' => 'sarah.torres@test.com', 'department_id' => 4, 'year_level' => '3rd Year', 'status' => 'active', 'phone' => '+63 912 345 6710', 'address' => '741 Bonifacio Street, Baguio City'],
            ['student_id' => '2024-0011', 'first_name' => 'Angelo', 'last_name' => 'Ramirez', 'email' => 'angelo.ramirez@test.com', 'department_id' => 1, 'year_level' => '2nd Year', 'status' => 'active', 'phone' => '+63 912 345 6711', 'address' => '852 Magsaysay Avenue, Davao City'],
            ['student_id' => '2024-0012', 'first_name' => 'Catherine', 'last_name' => 'Sanchez', 'email' => 'catherine.sanchez@test.com', 'department_id' => 2, 'year_level' => '4th Year', 'status' => 'active', 'phone' => '+63 912 345 6712', 'address' => '963 Recto Avenue, Manila'],
            ['student_id' => '2024-0013', 'first_name' => 'Kevin', 'last_name' => 'Gonzales', 'email' => 'kevin.gonzales@test.com', 'department_id' => 3, 'year_level' => '1st Year', 'status' => 'active', 'phone' => '+63 912 345 6713', 'address' => '174 Aguirre Street, Paranaque'],
            ['student_id' => '2024-0014', 'first_name' => 'Nicole', 'last_name' => 'Flores', 'email' => 'nicole.flores@test.com', 'department_id' => 4, 'year_level' => '2nd Year', 'status' => 'active', 'phone' => '+63 912 345 6714', 'address' => '285 Legarda Street, Manila'],
            ['student_id' => '2024-0015', 'first_name' => 'Raymond', 'last_name' => 'Ramos', 'email' => 'raymond.ramos@test.com', 'department_id' => 1, 'year_level' => '3rd Year', 'status' => 'active', 'phone' => '+63 912 345 6715', 'address' => '396 A. Mabini Street, Batangas'],
            ['student_id' => '2024-0016', 'first_name' => 'Jasmine', 'last_name' => 'Martinez', 'email' => 'jasmine.martinez@test.com', 'department_id' => 2, 'year_level' => '1st Year', 'status' => 'active', 'phone' => '+63 912 345 6716', 'address' => '407 P. Gomez Street, Iloilo City'],
            ['student_id' => '2024-0017', 'first_name' => 'Adrian', 'last_name' => 'Dizon', 'email' => 'adrian.dizon@test.com', 'department_id' => 3, 'year_level' => '4th Year', 'status' => 'active', 'phone' => '+63 912 345 6717', 'address' => '518 T. Claudio Street, Laguna'],
            ['student_id' => '2024-0018', 'first_name' => 'Princess', 'last_name' => 'Castillo', 'email' => 'princess.castillo@test.com', 'department_id' => 4, 'year_level' => '2nd Year', 'status' => 'active', 'phone' => '+63 912 345 6718', 'address' => '629 J. Luna Street, Pampanga'],
            ['student_id' => '2024-0019', 'first_name' => 'Christian', 'last_name' => 'Cruz', 'email' => 'christian.cruz@test.com', 'department_id' => 1, 'year_level' => '1st Year', 'status' => 'active', 'phone' => '+63 912 345 6719', 'address' => '730 M. H. del Pilar, Cavite'],
            ['student_id' => '2024-0020', 'first_name' => 'Kimberly', 'last_name' => 'Nguyen', 'email' => 'kimberly.nguyen@test.com', 'department_id' => 2, 'year_level' => '3rd Year', 'status' => 'active', 'phone' => '+63 912 345 6720', 'address' => '841 Aurora Boulevard, Quezon City'],
            ['student_id' => '2024-0021', 'first_name' => 'Patrick', 'last_name' => 'Perez', 'email' => 'patrick.perez@test.com', 'department_id' => 3, 'year_level' => '2nd Year', 'status' => 'active', 'phone' => '+63 912 345 6721', 'address' => '952 Tandang Sora, Quezon City'],
            ['student_id' => '2024-0022', 'first_name' => 'Angela', 'last_name' => 'Villar', 'email' => 'angela.villar@test.com', 'department_id' => 4, 'year_level' => '4th Year', 'status' => 'active', 'phone' => '+63 912 345 6722', 'address' => '163 Alabang-Zapote, Las Pinas'],
            ['student_id' => '2024-0023', 'first_name' => 'Brian', 'last_name' => 'Valencia', 'email' => 'brian.valencia@test.com', 'department_id' => 1, 'year_level' => '1st Year', 'status' => 'active', 'phone' => '+63 912 345 6723', 'address' => '274 Katipunan Avenue, Quezon City'],
            ['student_id' => '2024-0024', 'first_name' => 'Megan', 'last_name' => 'Dominguez', 'email' => 'megan.dominguez@test.com', 'department_id' => 2, 'year_level' => '2nd Year', 'status' => 'active', 'phone' => '+63 912 345 6724', 'address' => '385 Shaw Boulevard, Mandaluyong'],
            ['student_id' => '2024-0025', 'first_name' => 'Vincent', 'last_name' => 'Santiago', 'email' => 'vincent.santiago@test.com', 'department_id' => 3, 'year_level' => '3rd Year', 'status' => 'active', 'phone' => '+63 912 345 6725', 'address' => '496 Ortigas Avenue, Pasig'],
            ['student_id' => '2024-0026', 'first_name' => 'Lauren', 'last_name' => 'Ponce', 'email' => 'lauren.ponce@test.com', 'department_id' => 4, 'year_level' => '1st Year', 'status' => 'active', 'phone' => '+63 912 345 6726', 'address' => '507 Gilmore Street, Quezon City'],
            ['student_id' => '2024-0027', 'first_name' => 'Nathaniel', 'last_name' => 'Mercado', 'email' => 'nathaniel.mercado@test.com', 'department_id' => 1, 'year_level' => '4th Year', 'status' => 'active', 'phone' => '+63 912 345 6727', 'address' => '618 Espana Boulevard, Manila'],
            ['student_id' => '2024-0028', 'first_name' => 'Chelsea', 'last_name' => 'Luna', 'email' => 'chelsea.luna@test.com', 'department_id' => 2, 'year_level' => '2nd Year', 'status' => 'active', 'phone' => '+63 912 345 6728', 'address' => '729 T. M. Kalaw Street, Manila'],
            ['student_id' => '2024-0029', 'first_name' => 'Gabriel', 'last_name' => 'Reyes', 'email' => 'gabriel.reyes@test.com', 'department_id' => 3, 'year_level' => '3rd Year', 'status' => 'active', 'phone' => '+63 912 345 6729', 'address' => '830 J. P. Rizal Street, Makati'],
            ['student_id' => '2024-0030', 'first_name' => 'Vanessa', 'last_name' => 'Miranda', 'email' => 'vanessa.miranda@test.com', 'department_id' => 4, 'year_level' => '1st Year', 'status' => 'active', 'phone' => '+63 912 345 6730', 'address' => '941 Neptune Street, Manila'],
        ];

        foreach ($students as $student) {
            $user = User::create([
                'name' => $student['first_name'] . ' ' . $student['last_name'],
                'email' => $student['email'],
                'password' => Hash::make('password123'),
            ]);

            Student::create([
                'user_id' => $user->id,
                'student_id' => $student['student_id'],
                'first_name' => $student['first_name'],
                'last_name' => $student['last_name'],
                'department_id' => $student['department_id'],
                'year_level' => $student['year_level'],
                'status' => $student['status'],
                'phone' => $student['phone'],
                'address' => $student['address'],
                'enrollment_date' => now()->subMonths(rand(1, 12)),
            ]);
        }

        // Create schedules
        $schedules = [
            ['subject_id' => 1, 'day_of_week' => 'Monday', 'start_time' => '08:00', 'end_time' => '09:30', 'room' => 'Room 101', 'section' => 'A', 'semester' => '1st Semester', 'academic_year' => '2024-2025'],
            ['subject_id' => 1, 'day_of_week' => 'Wednesday', 'start_time' => '08:00', 'end_time' => '09:30', 'room' => 'Room 101', 'section' => 'A', 'semester' => '1st Semester', 'academic_year' => '2024-2025'],
            ['subject_id' => 2, 'day_of_week' => 'Tuesday', 'start_time' => '10:00', 'end_time' => '12:00', 'room' => 'Lab 201', 'section' => 'A', 'semester' => '1st Semester', 'academic_year' => '2024-2025'],
            ['subject_id' => 2, 'day_of_week' => 'Thursday', 'start_time' => '10:00', 'end_time' => '12:00', 'room' => 'Lab 201', 'section' => 'A', 'semester' => '1st Semester', 'academic_year' => '2024-2025'],
            ['subject_id' => 3, 'day_of_week' => 'Monday', 'start_time' => '13:00', 'end_time' => '14:30', 'room' => 'Room 102', 'section' => 'A', 'semester' => '1st Semester', 'academic_year' => '2024-2025'],
            ['subject_id' => 3, 'day_of_week' => 'Wednesday', 'start_time' => '13:00', 'end_time' => '14:30', 'room' => 'Room 102', 'section' => 'A', 'semester' => '1st Semester', 'academic_year' => '2024-2025'],
            ['subject_id' => 7, 'day_of_week' => 'Friday', 'start_time' => '09:00', 'end_time' => '10:30', 'room' => 'Room 301', 'section' => 'A', 'semester' => '1st Semester', 'academic_year' => '2024-2025'],
            ['subject_id' => 8, 'day_of_week' => 'Tuesday', 'start_time' => '14:00', 'end_time' => '16:00', 'room' => 'Lab 202', 'section' => 'A', 'semester' => '1st Semester', 'academic_year' => '2024-2025'],
        ];

        foreach ($schedules as $schedule) {
            Schedule::create($schedule);
        }

        // Create enrollments
        $enrollments = [
            ['student_id' => 1, 'subject_id' => 1, 'semester' => '1st Semester', 'academic_year' => '2024-2025', 'status' => 'enrolled', 'grade' => null],
            ['student_id' => 1, 'subject_id' => 2, 'semester' => '1st Semester', 'academic_year' => '2024-2025', 'status' => 'enrolled', 'grade' => null],
            ['student_id' => 2, 'subject_id' => 1, 'semester' => '1st Semester', 'academic_year' => '2024-2025', 'status' => 'completed', 'grade' => 95],
            ['student_id' => 2, 'subject_id' => 2, 'semester' => '1st Semester', 'academic_year' => '2024-2025', 'status' => 'completed', 'grade' => 88],
            ['student_id' => 2, 'subject_id' => 3, 'semester' => '1st Semester', 'academic_year' => '2024-2025', 'status' => 'enrolled', 'grade' => null],
            ['student_id' => 3, 'subject_id' => 7, 'semester' => '1st Semester', 'academic_year' => '2024-2025', 'status' => 'enrolled', 'grade' => null],
            ['student_id' => 4, 'subject_id' => 3, 'semester' => '1st Semester', 'academic_year' => '2024-2025', 'status' => 'enrolled', 'grade' => null],
            ['student_id' => 4, 'subject_id' => 4, 'semester' => '1st Semester', 'academic_year' => '2024-2025', 'status' => 'enrolled', 'grade' => null],
            ['student_id' => 5, 'subject_id' => 9, 'semester' => '1st Semester', 'academic_year' => '2024-2025', 'status' => 'enrolled', 'grade' => null],
            ['student_id' => 6, 'subject_id' => 10, 'semester' => '1st Semester', 'academic_year' => '2024-2025', 'status' => 'enrolled', 'grade' => null],
            ['student_id' => 7, 'subject_id' => 5, 'semester' => '1st Semester', 'academic_year' => '2024-2025', 'status' => 'completed', 'grade' => 92],
            ['student_id' => 7, 'subject_id' => 6, 'semester' => '1st Semester', 'academic_year' => '2024-2025', 'status' => 'completed', 'grade' => 85],
            ['student_id' => 8, 'subject_id' => 8, 'semester' => '1st Semester', 'academic_year' => '2024-2025', 'status' => 'enrolled', 'grade' => null],
        ];

        foreach ($enrollments as $enrollment) {
            Enrollment::create($enrollment);
        }

        $this->command->info('Database seeded successfully!');
        $this->command->info('Admin credentials: admin@test.com / password123');
    }
}

