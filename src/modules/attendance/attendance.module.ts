/* eslint-disable prettier/prettier */
import { Module } from '@nestjs/common';
import { AttendanceResolver } from './attenence.resolver';

@Module({
  providers: [AttendanceResolver],
})
export class AttendanceModule {}