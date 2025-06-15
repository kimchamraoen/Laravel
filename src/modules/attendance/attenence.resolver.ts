/* eslint-disable prettier/prettier */
import { Resolver, Query, Mutation, Args, Int } from '@nestjs/graphql';
import { Attendance, AttendanceStatus } from './attendance.model';

@Resolver(() => Attendance)
export class AttendanceResolver {
  private attendances: Attendance[] = [
    { session: 'Session1', status: AttendanceStatus.P, student_id: 1, marker: 'Teacher A', className: 'A' },
    { session: 'Session1', status: AttendanceStatus.L, student_id: 2, marker: 'Teacher A', className: 'B' },
    { session: 'Session2', status: AttendanceStatus.A, student_id: 3, marker: 'Teacher B', className: 'A' },
    { session: 'Session1', status: AttendanceStatus.P, student_id: 4, marker: 'Teacher B', className: 'A' },
    { session: 'Session2', status: AttendanceStatus.A, student_id: 5, marker: 'Teacher B', className: 'C' },
    { session: 'Session2', status: AttendanceStatus.AP, student_id: 6, marker: 'Teacher B', className: 'B' },
  ];

@Mutation(() => Attendance) 
markAttendance(
  @Args('session') session: string,
  @Args('status') status: AttendanceStatus,
  @Args('student_id', { type: () => Int }) student_id: number,
  @Args('marker') marker: string,
) {
  const className = student_id % 2 === 0 ? 'B' : 'A';
  const newRecord = { session, status, student_id, marker, className };

  // Optional: log it to debug
  console.log('New Record:', newRecord);

  this.attendances.push(newRecord);
  return newRecord;
}


  // Remove attendance
  @Mutation(() => Boolean)
  removeAttendance(
    @Args('session') session: string,
    @Args('student_id', { type: () => Int }) student_id: number,
  ) {
    const originalLength = this.attendances.length;
    this.attendances = this.attendances.filter(
      att => !(att.session === session && att.student_id === student_id),
    );
    return this.attendances.length < originalLength;
  }

  // Count attendance by class name
  @Query('countAttendanceByClass')
  countAttendanceByClass(@Args('className') className: string) {
    return this.attendances.filter(att => att.className === className).length;
  }

  // Count attendance by student's ID
  @Query('countAttendanceByStudentId')
  countAttendanceByStudentId(@Args('student_id', { type: () => Int }) student_id: number) {
    return this.attendances.filter(att => att.student_id === student_id).length;
  }
}