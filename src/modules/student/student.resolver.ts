/* eslint-disable prettier/prettier */
import { Resolver, Query, Mutation, Args, Int } from '@nestjs/graphql';

@Resolver('Student')
export class StudentResolver {
  private students = [
    { id: 1, name: 'Alice', idCard: 'ID001', className: 'A' },
    { id: 2, name: 'Bob', idCard: 'ID002', className: 'B' },
    { id: 3, name: 'Charlie', idCard: 'ID003', className: 'A' },
    { id: 4, name: 'Bopha', idCard: 'ID004', className: 'A' },
    { id: 5, name: 'Dara', idCard: 'ID005', className: 'C' },
    { id: 6, name: 'Sophy', idCard: 'ID006', className: 'B' },
  ];

  // Get all students
  @Query('students')
  getAllStudents() {
    return this.students;
  }

  // Get students by class name
  @Query('studentsByClass')
  getStudentsByClass(@Args('className') className: string) {
    return this.students.filter((student) => student.className === className);
  }

  // Enroll student to class
  @Mutation('enrollStudent')
  enrollStudent(
    @Args('id', { type: () => Int }) id: number,
    @Args('className') className: string,
  ) {
    const student = this.students.find(s => s.id === id);
    if (student) {
      student.className = className;
    }
    return student;
  }

  // Remove student from class
  @Mutation('removeStudentFromClass')
  removeStudentFromClass(@Args('id', { type: () => Int }) id: number) {
    const student = this.students.find(s => s.id === id);
    if (student) {
      student.className = '';
      return true;
    }
    return false;
  }

  // Update student's information
  @Mutation('updateStudent')
  updateStudent(
    @Args('id', { type: () => Int }) id: number,
    @Args('name') name: string,
    @Args('idCard') idCard: string,
    @Args('className') className: string,
  ) {
    const student = this.students.find(s => s.id === id);
    if (student) {
      student.name = name;
      student.idCard = idCard;
      student.className = className;
    }
    return student;
  }
}