<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            overflow-x: hidden;
        }

        .header {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header h1 {
            color: white;
            font-weight: 300;
            font-size: 2rem;
            text-align: center;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .main-container {
            max-width: 1400px;
            margin: 2rem auto;
            padding: 0 1rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            align-items: start;
        }

        .card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1.5rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .card-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            animation: shine 3s infinite;
        }

        @keyframes shine {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        .card-header h2 {
            font-size: 1.8rem;
            font-weight: 300;
            margin-bottom: 0.5rem;
        }

        .card-header i {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            opacity: 0.8;
        }

        .card-body {
            padding: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #333;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-control {
            width: 100%;
            padding: 1rem;
            border: 2px solid #e1e5e9;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .form-control:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }

        .form-control:hover {
            border-color: #667eea;
        }

        .form-check {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            margin-bottom: 1.5rem;
            padding: 1rem;
            background: #f8f9fa;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .form-check:hover {
            background: #e9ecef;
        }

        .form-check-input {
            width: 20px;
            height: 20px;
            accent-color: #667eea;
        }

        .form-check-label {
            font-weight: 500;
            color: #333;
            cursor: pointer;
        }

        .btn-submit {
            width: 100%;
            padding: 1rem 2rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            overflow: hidden;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .alert {
            padding: 1rem;
            margin-bottom: 1.5rem;
            border-radius: 12px;
            border: none;
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
            font-weight: 500;
            animation: slideIn 0.5s ease;
        }

        @keyframes slideIn {
            from { transform: translateX(-100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }

        .students-list {
            max-height: 600px;
            overflow-y: auto;
            margin-top: 1rem;
        }

        .students-list::-webkit-scrollbar {
            width: 8px;
        }

        .students-list::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .students-list::-webkit-scrollbar-thumb {
            background: #667eea;
            border-radius: 10px;
        }

        .student-card {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            border-left: 4px solid #667eea;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .student-card:hover {
            transform: translateX(5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .student-name {
            font-size: 1.2rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 0.5rem;
        }

        .student-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 0.5rem;
            font-size: 0.9rem;
            color: #666;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .info-item i {
            color: #667eea;
            width: 16px;
        }

        .no-students {
            text-align: center;
            padding: 3rem;
            color: #666;
            font-size: 1.1rem;
        }

        .no-students i {
            font-size: 4rem;
            color: #ddd;
            margin-bottom: 1rem;
        }

        .floating-shapes {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        .shape {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 15s infinite linear;
        }

        .shape:nth-child(1) { width: 80px; height: 80px; top: 20%; left: 10%; animation-delay: 0s; }
        .shape:nth-child(2) { width: 120px; height: 120px; top: 60%; left: 80%; animation-delay: 2s; }
        .shape:nth-child(3) { width: 60px; height: 60px; top: 80%; left: 20%; animation-delay: 4s; }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        @media (max-width: 768px) {
            .main-container {
                grid-template-columns: 1fr;
                gap: 1rem;
                margin: 1rem auto;
            }
            
            .card-body {
                padding: 1.5rem;
            }
            
            .student-info {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <header class="header">
        <h1><i class="fas fa-graduation-cap"></i> Student Registration Portal</h1>
    </header>

    <div class="main-container">
        <!-- Registration Form -->
        <div class="card">
            <div class="card-header">
                <i class="fas fa-user-plus"></i>
                <h2>New Student Registration</h2>
                <p>Join our academic community</p>
            </div>
            <div class="card-body">
                <!-- Laravel Blade syntax preserved -->
                @if(session('success'))
                    <div class="alert">
                        <i class="fas fa-check-circle"></i> {{ session('success') }}
                    </div>
                @endif
                
                <form action="/add-student" method="post">
                    <div class="form-group">
                        <label for="name" class="form-label">
                            <i class="fas fa-user"></i> Full Name
                        </label>
                        <input type="text" class="form-control" name="name" placeholder="Enter your full name" required>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">
                            <i class="fas fa-envelope"></i> Email Address
                        </label>
                        <input type="email" class="form-control" name="email" placeholder="your.email@example.com" required>
                    </div>

                    <div class="form-group">
                        <label for="phone" class="form-label">
                            <i class="fas fa-phone"></i> Phone Number
                        </label>
                        <input type="tel" class="form-control" name="phone" placeholder="+1 (555) 123-4567" required>
                    </div>

                    <div class="form-group">
                        <label for="address" class="form-label">
                            <i class="fas fa-map-marker-alt"></i> Address
                        </label>
                        <textarea class="form-control" name="address" rows="3" placeholder="Enter your complete address" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="gender" class="form-label">
                            <i class="fas fa-venus-mars"></i> Gender
                        </label>
                        <select class="form-control" name="gender" required>
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="department" class="form-label">
                            <i class="fas fa-building"></i> Department
                        </label>
                        <input type="text" class="form-control" name="department" placeholder="e.g., Computer Science" required>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="parttime" value="1" id="parttime">
                        <label class="form-check-label" for="parttime">
                            <i class="fas fa-clock"></i> Part-time Student
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="joined_date" class="form-label">
                            <i class="fas fa-calendar"></i> Joined Date
                        </label>
                        <input type="date" class="form-control" name="joined_date" required>
                    </div>

                    <button type="submit" class="btn-submit">
                        <i class="fas fa-paper-plane"></i> Register Student
                    </button>
                    @csrf
                </form>
            </div>
        </div>

        <!-- Students List -->
        <div class="card">
            <div class="card-header">
                <i class="fas fa-users"></i>
                <h2>Registered Students</h2>
                <p>Current academic roster</p>
            </div>
            <div class="card-body">
                @if($students && count($students) > 0)
                <div class="students-list">
                    @foreach($students as $student)
                    <div class="student-card">
                        <div class="student-name">{{ $student->name }}</div>
                        <div class="student-info">
                            <div class="info-item">
                                <i class="fas fa-envelope"></i>
                                <span>{{ $student->email }}</span>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-building"></i>
                                <span>{{ $student->department }}</span>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-calendar"></i>
                                <span>{{ $student->joined_date }}</span>
                            </div>
                            @if($student->parttime)
                            <div class="info-item">
                                <i class="fas fa-clock"></i>
                                <span>Part-time</span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="no-students">
                    <i class="fas fa-user-graduate"></i>
                    <div>No students registered yet.</div>
                    <small>Be the first to join our academic community!</small>
                </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>