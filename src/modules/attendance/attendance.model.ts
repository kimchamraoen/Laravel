/* eslint-disable prettier/prettier */
// attendance.model.ts
import { ObjectType, Field, Int, registerEnumType } from '@nestjs/graphql';

export enum AttendanceStatus {
  PRESENT = 'PRESENT',
  ABSENT = 'ABSENT',
  LATE = 'LATE',
  P = "P",
  L = "L",
  A = "A",
  AP = "AP"
}

registerEnumType(AttendanceStatus, {
  name: 'AttendanceStatus',
});

@ObjectType()
export class Attendance {
  @Field()
  session: string;

  @Field(() => AttendanceStatus)
  status: AttendanceStatus;

  @Field(() => Int)
  student_id: number;

  @Field()
  marker: string;

  @Field()
  className: string;
}